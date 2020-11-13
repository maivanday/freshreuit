<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\category;
use App\product;


class HomeController extends Controller
{
    public function index()
    {
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->paginate(12);
        return view('frontend_web.home.index', compact('categorys', 'products'));
    }

    //frontend
    public function showProductCategory($name, $categoryId)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::where('category_id', $categoryId)->paginate(8);

        if (Auth::check()) {
            return view('frontend_web.product.categoryList', compact('categorys', 'products'));
        } else return view('frontend_web.product.categoryNoLogin', compact('categorys', 'products'));
    }

    public function showProductDetail($name, $id)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::where('id', $id)->get();
        if (Auth::check()) {
            return view('frontend_web.product.productDetail', compact('categorys', 'products'));
        } else return view('frontend_web.product.productNoLogin', compact('categorys', 'products'));
    }

    public function showUser()
    {
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->paginate(12);
        return view('frontend_web.home.home_user', compact('categorys', 'products'));
    }

    //gio hang
    public function addToCart($id)
    {

        $product = Product::find($id);
        $cart =   session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->feature_img_path,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }

    public function showCart()
    {
        $carts = session()->get('cart');
        return view('frontend_web.product.addToCart', compact('carts'));
    }
    //update
    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartUpdate = view('frontend_web/product/cartContent', compact('carts'))->render();
            return response()->json(['cartUpdate' => $cartUpdate, 'code' => 200], 200);
        }
    }
    //delete cart
    public function deleteCart(request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);

            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartUpdate = view('frontend_web/product/cartContent', compact('carts'))->render();
            return response()->json(['cartUpdate' => $cartUpdate, 'code' => 200], 200);
        }
    }
}
