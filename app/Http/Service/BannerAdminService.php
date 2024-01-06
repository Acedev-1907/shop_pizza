<?php

namespace App\Http\Service;

use Illuminate\Http\Request;

class BannerAdminService
{
    public function processImage($img)
    {
        $originalName = $img->getClientOriginalName(); // Lấy tên gốc của tệp tin
        $extension = $img->getClientOriginalExtension(); // Lấy phần mở rộng của tệp tin

        $fileName = pathinfo($originalName, PATHINFO_FILENAME); // Lấy tên file (không bao gồm phần mở rộng)
        $counter = 1;

        $baseFileName = $fileName; // Lưu trữ tên file gốc

        // Kiểm tra sự tồn tại của tệp tin
        while (file_exists(public_path('upload/gallery/' . $fileName . '.' . $extension))) {
            $fileName = $baseFileName . '(' . $counter . ')'; // Thêm chỉ mục vào tên tệp tin
            $counter++;
        }

        $fileName = $fileName . '.' . $extension; // Kết hợp tên tệp tin với phần mở rộng

        $img->move(public_path('upload/gallery'), $fileName); // Di chuyển tệp tin đến thư mục đích

        return $fileName;
    }

    public function saveBannerImage($img)
    {
        $imageName = $this->processImage($img);
        return $imageName;
    }

    public function deleteBannerImage($imageName)
    {
        $imagePath = public_path('upload/gallery') . '/' . $imageName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
