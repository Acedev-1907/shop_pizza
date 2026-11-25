<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
        Paginator::useBootstrap();
        // view()->composer('*', function ($view) {
        //     $cats_home = Category::orderBy('name', 'ASC')->where('status', 1)->get();
        //     $products_home = Product::orderBy('name', 'ASC')->where('status', 1)->get();
        //     $view->with(compact('cats_home', 'products_home'));
        // });

        // Memoize theo request để mọi view đều có biến nhưng chỉ query tối đa 1 lần/request
        view()->composer('*', function ($view) {
            static $shared = null;
            if ($shared === null) {
                $cats_home = Category::orderBy('name', 'ASC')
                    ->where('status', 1)
                    ->whereRaw('(SELECT COUNT(*) FROM products WHERE products.category_id = categories.id AND products.status <> 0) > 0')
                    ->get();

                $products_home = Product::orderBy('name', 'ASC')
                    ->where('status', 1)
                    ->get();

                $customerId = auth('cus')->id();
                $carts = $customerId ? Cart::where('customer_id', $customerId)->get() : collect();
                $shared = compact('cats_home', 'products_home', 'carts');
            }
            $view->with($shared);
        });
    }
}
