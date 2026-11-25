<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $appends = ['favorited'];
    protected $fillable = ['name', 'status', 'price', 'sale_price', 'image', 'category_id', 'description'];

    public function cat()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function getFavoritedAttribute()
    {
        $customerId = auth('cus')->id();
        if (!$customerId) {
            return false;
        }

        static $favoritedIdsByCustomer = [];
        if (!isset($favoritedIdsByCustomer[$customerId])) {
            $favoritedIdsByCustomer[$customerId] = Favorite::where('customer_id', $customerId)
                ->pluck('product_id')
                ->flip()
                ->all();
        }

        return isset($favoritedIdsByCustomer[$customerId][$this->id]);
    }

    //truy vấn tới favorites carts product_images
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'product_id', 'id');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'product_id', 'id');
    }

    // public function product_images()
    // {
    //     return $this->hasMany(ProductImage::class, 'product_id', 'id');
    // }
}
