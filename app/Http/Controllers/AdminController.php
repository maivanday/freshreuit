<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function loginAdmin()
    {
        return view('login');
    }

    public function postLoginAdmin(request $request)
    {
        $array = [

            'email' => $request->email,
            'password' => $request->password

        ];
        if (Auth::attempt($array)) {

            return redirect(route('home.user'));
        } else {
            return redirect()->to('login');
        }
    }
    public function showHomeAdmin()
    {
        return view('home');
    }
    //--------------
    public function register()
    {
        return view('register');
    }

    public function postRegister(request $request)
    {
        //dd($request);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->to('login');
    }

    //
    public function logout(request $request)
    {
        $request->session()->forget('email');
        $request->session()->forget('password');
        Auth::logout();

        return redirect('/');
    }

    //
}
