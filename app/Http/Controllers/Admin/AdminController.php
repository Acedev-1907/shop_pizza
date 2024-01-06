<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $product = Product::all()->count();
        $category = Category::all()->count();
        return view('admin.index', compact('product', 'category'));
    }

    public function login()
    {
        return view('admin.login');
    }
    public function check_login(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        $data = $req->only('email', 'password');

        $check = auth()->attempt($data);

        if ($check) {
            return redirect()->route('admin.index')->with('ok', 'Welcome Back');
        }

        return redirect()->back()->with('no', 'Your email or password it not match');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('ok', 'Account has been logged out');
    }
}
