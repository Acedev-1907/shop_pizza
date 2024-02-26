<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Category::all();

        if ($key = request()->key) {
            $cats = Category::orderBy('created_at', 'DESC')
                ->where(function ($query) use ($key) {
                    $query->where('name', 'LIKE', '%' . $key . '%');
                })
                ->paginate(10);
        }
        return view('admin.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required|in:0,1',
        ], [
            'name.required' => 'The category name is required.',
        ]);

        $name = $request->input('name');

        // Kiểm tra xem danh mục đã tồn tại hay chưa
        $category = Category::where('name', $name)->first();

        if ($category) {
            return redirect()->route('category.create')->with('no', 'Category with the same name already exists.');
        }

        Category::create($request->all());

        return redirect()->route('category.index')->with('ok', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $check =  $category->update($request->all());
        if ($check) {
            return redirect()->route('category.index')->with('ok', 'Category update successfully.');
        }
        return redirect()->route('category.index')->with('no', 'Category update fail.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Xóa tất cả các sản phẩm liên quan
        $category->products()->each(function ($product) {
            $product->favorites()->delete();
            $product->carts()->delete();

            // Xóa hình liên quan tới sản phẩm
            $img_name = $product->image;
            $image_path = public_path('upload/product/' . $img_name);

            if (file_exists($image_path)) {
                unlink($image_path);
            }

            if ($product->images->count() > 0) {
                foreach ($product->images as $img) {
                    $other_image = $img->image;
                    $other_path = public_path('upload/product') . '/' . $other_image;

                    if (file_exists($other_path)) {
                        unlink($other_path);
                    }
                }

                ProductImage::where('product_id', $product->id)->delete();
            }

            $product->delete();
        });

        // Xóa danh mục
        $check = $category->delete();

        if ($check) {
            return redirect()->route('category.index')->with('ok', 'Category deleted successfully.');
        }

        return redirect()->route('category.index')->with('no', 'Failed to delete category.');
    }
}
