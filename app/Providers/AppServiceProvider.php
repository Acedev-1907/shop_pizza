<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        // view()->composer('*', function ($view) {
        //     $cats_home = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        //     $products_home = Product::orderBy('name', 'ASC')->where('status', 1)->get();
        //     $view->with(compact('cats_home', 'products_home'));
        // });

        // Nâng cao đếm số product trong category
        view()->composer('*', function ($view) {
            $cats_home = Category::orderBy('name', 'ASC')
                ->where('status', 1)
                ->whereRaw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND products.status <> 0) > 0')
                ->get();

            $products_home = Product::orderBy('name', 'ASC')
                ->where('status', 1)
                ->get();

            $carts = Cart::where('customer_id', auth('cus')->id())->get();
            $view->with(compact('cats_home', 'products_home', 'carts'));
        });
    }
}
