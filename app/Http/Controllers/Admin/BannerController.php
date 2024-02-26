<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\BannerAdminService;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerService;

    public function __construct(BannerAdminService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        $banners = Banner::all();

        if ($key = request()->key) {
            $banners = Banner::orderBy('created_at', 'DESC')
                ->where(function ($query) use ($key) {
                    $query->where('name', 'LIKE', '%' . $key . '%');
                })
                ->paginate(10);
        }
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only('name', 'description', 'status');

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageFileName = $this->bannerService->saveBannerImage($image);
            $data['image'] = $imageFileName;
        }

        // Kiểm tra xem banner đã tồn tại hay chưa
        $existingBanner = Banner::where('name', $data['name'])->first();
        if ($existingBanner) {
            return redirect()->route('banner.create')->with('no', 'Banner with the same name already exists.');
        }

        Banner::create($data);

        return redirect()->route('banner.index')->with('ok', 'Banner created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:banners,name,' . $banner->id,
            'img' => 'file|mimes:png,jpg,jpeg,gif',
        ], [
            'name.required' => 'The banner name is required.',
            'name.min' => 'The banner name must be at least 4 characters.',
            'name.max' => 'The banner name may not exceed 150 characters.',
            'name.unique' => 'The banner name has already been taken.',
            'img.file' => 'The image must be a file.',
            'img.mimes' => 'The image must be in PNG, JPG, JPEG, or GIF format.',
        ]);

        $data = $request->only('name', 'description', 'status');

        if ($request->hasFile('img')) {
            // Xóa hình cũ nếu tồn tại
            if ($banner->image) {
                $this->bannerService->deleteBannerImage($banner->image);
            }

            // Lưu hình ảnh mới
            $imagePath = $this->bannerService->saveBannerImage($request->file('img'));
            $data['image'] = $imagePath;
        }

        if ($banner->update($data)) {
            return redirect()->route('banner.index')->with('ok', 'Update banner successfully');
        }

        return redirect()->back()->with('no', 'Something error, Please try again');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $imagePath = $banner->image;

        // Xóa banner
        $banner->delete();

        // Xóa hình ảnh từ thư mục chứa
        if ($imagePath) {
            $this->bannerService->deleteBannerImage($imagePath);
        }

        return redirect()->route('banner.index')->with('ok', 'Delete banner successfully');
    }
}
