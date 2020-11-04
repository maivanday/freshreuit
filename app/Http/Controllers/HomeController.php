<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\product;


class HomeController extends Controller
{
    public function index()
    {
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->paginate(12);
        return view('frontend.home.index', compact('categorys', 'products'));
    }
    //frontend
    public function showProductCategory($name, $categoryId)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::where('category_id', $categoryId)->paginate(8);
        return view('frontend.product.categoryList', compact('categorys', 'products'));
    }
    public function showProductDetail($name, $id)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::where('id', $id)->get();
        return view('frontend.product.productDetail', compact('categorys', 'products'));
    }
}
