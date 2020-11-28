<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\tag;
use App\productTag;
use App\productImage;
use App\order;
use App\orderItem;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\productAddRequest;
use Storage;
use App\Traits\StorageImgTrait;
use DB;
use Illuminate\Support\Facades\Log;


class AdminProductController extends Controller

{

    use StorageImgTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    private $order;
    private $orderItem;





    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        Tag $tag,
        ProductTag $productTag,
        Order $order,
        OrderItem $orderItem

    ) {


        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->order = $order;
        $this->orderItem = $orderItem;
    }


    public function index()
    {
        $products = $this->product->latest()->paginate(6);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }

    public function store(productAddRequest $request)

    {
        // $dataProductCreate = [
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'content' => $request->contents,
        //     'user_id' => auth()->id(),
        //     'category_id' => $request->category_id

        // ];
        // $dataUploadFeatureImg = $this->storageTraitUpload($request, 'feature_img_path', 'product');
        // if (!empty($dataUploadFeatureImg)) {

        //     $dataProductCreate['feature_img_name'] = $dataUploadFeatureImg['file_name'];
        //     $dataProductCreate['feature_image_path'] = $dataUploadFeatureImg['file_path'];
        // }
        // $product = $this->product->create($dataProductCreate);

        // dd($product);




        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id

            ];

            $dataUploadFeatureImg = $this->storageTraitUpload($request, 'feature_img_path', 'product');
            if (!empty($dataUploadFeatureImg)) {

                $dataProductCreate['feature_img_name'] = $dataUploadFeatureImg['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImg['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            //them data to product image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']

                    ]);
                }
            }
            // them tags to product
            if (!empty($request->tags)) {

                foreach ($request->tags as $tagItem) {
                    //them to tags_select
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '  line: ' . $exception->getLine());
        }
    }

    //edit product
    public function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption', 'product'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id

            ];

            $dataUploadFeatureImg = $this->storageTraitUpload($request, 'feature_img_path', 'product');
            if (!empty($dataUploadFeatureImg)) {

                $dataProductUpdate['feature_img_name'] = $dataUploadFeatureImg['file_name'];
                $dataProductUpdate['feature_img_path'] = $dataUploadFeatureImg['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            //them data to product image
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', 'id')->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']

                    ]);
                }
            }
            // them tags to product
            if (!empty($request->tags)) {

                foreach ($request->tags as $tagItem) {
                    //them to tags_select
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '  line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'

            ]);
        } catch (\Exception $exception) {

            Log::error('Message: ' . $exception->getMessage() . '  line: ' . $exception->getLine());
        }
    }
    // show order
    function showOrder()
    {

        $orders = $this->order->latest()->paginate(6);
        return view('admin.order.index', compact('orders'));
    }
    // show orderItem
    function showOrderItem()
    {
        $orderItems = $this->orderItem->latest()->paginate(6);
        return view('admin.order.orderItem', compact('orderItems'));
    }
}
