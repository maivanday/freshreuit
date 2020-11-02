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
}
