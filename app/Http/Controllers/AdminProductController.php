<?php

namespace App\Http\Controllers;

use App\category;
use App\product;
use App\tag;
use App\productTag;
use App\productImage;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Storage;
use App\Traits\StorageImgTrait;
use DB;

class AdminProductController extends Controller

{

    use StorageImgTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;




    public function __construct(
        Category $category,
        Product $product,
        ProductImage $productImage,
        Tag $tag,
        ProductTag $productTag
    ) {


        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
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

    public function store(Request $request)
    {
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
                $dataProductCreate['feature_img_path'] = $dataUploadFeatureImg['file_path'];
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
}
