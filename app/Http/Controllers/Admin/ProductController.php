<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\ProductAdminService;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product::orderBy('id', 'desc')->paginate(20);
        if ($key = request()->key) {
            $data = Product::orderBy('created_at', 'DESC')
                ->where(function ($query) use ($key) {
                    $query->where('name', 'LIKE', '%' . $key . '%');
                })
                ->paginate(10);
        }
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::orderBY('name', 'asc')->select('id', 'name')->get();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:products',
            'price' => 'required|numeric',
            'description' => 'required|min:4',
            'sale_price' => 'nullable|numeric|lte:price',
            'img' => 'required|file|mimes:png,jpg,jpeg,png,gif',
            'category_id' => 'required|exists:categories,id'
        ], [
            'name.required' => 'The product name is required.',
            'name.min' => 'The product name must be at least 4 characters.',
            'name.max' => 'The product name may not exceed 150 characters.',
            'name.unique' => 'The product name has already been taken.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a numeric value.',
            'sale_price.numeric' => 'The sale price must be a numeric value.',
            'sale_price.lte' => 'The sale price must be less than or equal to the original price.',
            'img.file' => 'The image must be a file.',
            'img.mimes' => 'The image must be in PNG, JPG, JPEG, or GIF format.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.'
        ]);

        $data = $request->only('name', 'price', 'sale_price', 'status', 'description', 'category_id');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $data['image'] = $this->productService->processImage($image, $data);
        }

        if ($product = Product::create($data)) {
            if ($request->has('other_img')) {
                foreach ($request->other_img as $img) {
                    $other_name = $img->hashName();
                    $img->move(public_path('upload/product'), $other_name);
                    ProductImage::create(
                        [
                            'image' => $other_name,
                            'product_id' => $product->id
                        ]
                    );
                }
            }
            return redirect()->route('product.index')->with('ok', 'Create new product successfully');
        }
        return redirect()->back('')->with('no', 'Something error, Please try again');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $cats = Category::orderBY('name', 'asc')->select('id', 'name')->get();
        return view('admin.product.edit', compact('cats', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:products,name,' . $product->id,
            'description' => 'required|min:4',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric|lte:price',
            'img' => 'file|mimes:png,jpg,jpeg,png,gif',
            'category_id' => 'required|exists:categories,id'
        ], [
            'name.required' => 'The product name is required.',
            'name.min' => 'The product name must be at least 4 characters.',
            'name.max' => 'The product name may not exceed 150 characters.',
            'name.unique' => 'The product name has already been taken.',
            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a numeric value.',
            'img.file' => 'The image must be a file.',
            'img.mimes' => 'The image must be in PNG, JPG, JPEG, or GIF format.',
            'category_id.required' => 'The category is required.',
            'category_id.exists' => 'The selected category does not exist.'
        ]);

        $data = $request->only('name', 'price', 'sale_price', 'status', 'description', 'category_id');

        if ($request->hasFile('img')) {
            // Xóa hình cũ nếu tồn tại
            if ($product->image) {
                $this->productService->deleteProductImage($product->image);
            }

            // Lưu hình ảnh mới
            $imagePath = $this->productService->saveProductImage($request->file('img'));
            $data['image'] = $imagePath;
        }

        if ($product->update($data)) {

            if ($request->has('other_img')) {
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
                foreach ($request->other_img as $img) {
                    $other_name = $img->hashName();
                    $img->move(public_path('upload/product'), $other_name);
                    ProductImage::create(
                        [
                            'image' => $other_name,
                            'product_id' => $product->id
                        ]
                    );
                }
            }

            return redirect()->route('product.index')->with('ok', 'Update product successfully');
        }
        return redirect()->back('')->with('no', 'Something error, Please try again');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $img_name = $product->image;
        $image_path = public_path('upload/product/' . $img_name);

        //Nếu sản phẩm xóa có trong giỏ hàng của khách thì xóa lun
        Cart::where('product_id', $product->id)->delete();
        Favorite::where('product_id', $product->id)->delete();


        //Xóa hình hình chính và hình phụ liên quan tới sản phẩm
        if ($product->images->count() > 0) {
            foreach ($product->images as $img) {
                $other_image = $img->image;
                $other_path = public_path('upload/product') . '/' . $other_image;

                if (file_exists($other_path)) {
                    unlink($other_path);
                }
            }

            ProductImage::where('product_id', $product->id)->delete();

            if ($product->delete()) {
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
                return redirect()->route('product.index')->with('ok', 'Deleted product successfully');
            }
        } else {
            if ($product->delete()) {
                if (file_exists($image_path)) {
                    unlink($other_path);
                }
                return redirect()->route('product.index')->with('ok', 'Deleted product successfully');
            }
        }
        return redirect()->back()->with('no', 'Something went wrong. Please try again.');
    }

    public function destroyImage(ProductImage $image)
    {
        $img_name = $image->image;
        if ($image->delete()) {
            $image_path = public_path('/upload/product') . '/' . $img_name;
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            return redirect()->back()->with('ok', 'Delete image successfully');
        }

        return redirect()->back()->with('no', 'Something error, Please try again');
    }
}
