<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topBanner = Banner::getBanner('top-banner')->first();
        $gallerys = Banner::getBanner('gallery')->get();
        $top_product = Product::inRandomOrder()->first(); //Random Sản phẩm đầu trang
        $new_products = Product::orderBy('created_at', 'desc')->limit(2)->get();
        $sale_products = Product::orderBy('created_at', 'desc')->where('sale_price', '>', '0')->limit(3)->get();
        $feature_products = Product::inRandomOrder()->limit(4)->get();
        return view('home.index', compact('top_product', 'topBanner', 'gallerys', 'new_products', 'sale_products', 'feature_products'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function allcategory(Category $cat)
    {
        $existing_products = $cat->products()->paginate(9);
        $new_products = Product::orderBy('created_at', 'DESC')->limit(9)->get();

        $products = $existing_products->merge($new_products);

        return view('home.category', compact('cat', 'products', 'new_products'));
    }

    public function category(Category $cat)
    {
        $products = $cat->products()->paginate(9);
        $new_products = Product::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('home.category', compact('cat', 'products', 'new_products'));
    }

    public function product(Product $product)
    {
        $products = Product::where('category_id', $product->category_id)->limit(12)->get();
        $prod_related = Product::orderBy('created_at', 'DESC')->limit(6)->get();

        return view('home.product', compact('product', 'products', 'prod_related'));
    }
    public function favorite($product_id)
    {
        // $user_id = auth('cus')->id();
        $data = [
            'product_id' => $product_id,
            'customer_id' => auth('cus')->id(),
        ];

        $favorited = Favorite::where(['product_id' => $product_id, 'customer_id' => auth('cus')->id()])->first();
        if ($favorited) {
            $favorited->delete();
            return redirect()->back()->with('ok', 'Bạn đã bỏ yêu thích sản phẩm');
        } else {
            Favorite::create($data);
            return redirect()->back()->with('ok', 'Bạn đã yêu thích sản phẩm');
        }
    }
}
