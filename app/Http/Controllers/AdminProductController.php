<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Storage;
use App\Traits\StorageImgTrait;

class AdminProductController extends Controller

{
    use StorageImgTrait;
    private $category;
    public function __construct(Category $category)
    {

        $this->category = $category;
    }


    public function index()
    {
        return view('admin.product.index');
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
        $data = $this->storageTraitUpload($request, 'feature_img_path', 'product');

        dd($data);
    }
}
