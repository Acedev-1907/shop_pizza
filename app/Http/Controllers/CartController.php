<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('customer_id', auth('cus')->id())->get();
        return view('home.cart', compact('carts'));
    }

    public function add(Product $product, Request $req)
    {
        $quantity = $req->quantity ? floor($req->quantity) : 1;

        $cus_id = auth('cus')->id();

        $cartExits = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id,
        ])->first();
        if ($cartExits) {

            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id,
            ])->increment('quantity', $quantity);

            // $cartExits->update([
            //     'quantity' => $cartExits->quantity + $quantity
            // ]);
            return redirect()->route('cart.index')->with('ok', 'Update product to cart successfully');
        } else {
            $data = [
                'customer_id' => auth('cus')->id(),
                'product_id' => $product->id,
                'price' => $product->sale_price ? $product->sale_price : $product->price,
                'quantity' => $quantity
            ];
            if (Cart::create($data)) {
                return redirect()->route('cart.index')->with('ok', 'Add product to cart successfully');
            }
        }
        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function update(Product $product, Request $req)
    {
        $quantity = $req->quantity ? floor($req->quantity) : 1;

        $cus_id = auth('cus')->id();
        $cartExits = Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product->id,
        ])->first();
        if ($cartExits) {
            Cart::where([
                'customer_id' => $cus_id,
                'product_id' => $product->id,
            ])->update([
                'quantity' => $quantity
            ]);
            return redirect()->route('cart.index')->with('ok', 'Update product to cart successfully');
        }
        return redirect()->back()->with('no', 'Something error, please try again');
    }

    public function delete($product_id)
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id,
            'product_id' => $product_id,
        ])->delete();
        return redirect()->back()->with('ok', 'Cart deleted successfully');
    }

    public function clear()
    {
        $cus_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $cus_id
        ])->delete();
        return redirect()->back()->with('ok', 'Cart deleted successfully');
    }
}
