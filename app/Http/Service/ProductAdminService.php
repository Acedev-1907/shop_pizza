<?php

namespace App\Http\Service;

use Illuminate\Http\Request;

class ProductAdminService
{
    public function processImage($img)
    {
        $originalName = $img->getClientOriginalName(); // Lấy tên gốc của tệp tin
        $extension = $img->getClientOriginalExtension(); // Lấy phần mở rộng của tệp tin

        $fileName = pathinfo($originalName, PATHINFO_FILENAME); // Lấy tên file (không bao gồm phần mở rộng)
        $counter = 1;

        $baseFileName = $fileName; // Lưu trữ tên file gốc

        // Kiểm tra sự tồn tại của tệp tin
        while (file_exists(public_path('upload/product/' . $fileName . '.' . $extension))) {
            $fileName = $baseFileName . '(' . $counter . ')'; // Thêm chỉ mục vào tên tệp tin
            $counter++;
        }

        $fileName = $fileName . '.' . $extension; // Kết hợp tên tệp tin với phần mở rộng

        $img->move(public_path('upload/product'), $fileName); // Di chuyển tệp tin đến thư mục đích

        return $fileName;
    }

    public function saveProductImage($img)
    {
        $imageName = $this->processImage($img);
        return $imageName;
    }

    public function deleteProductImage($imageName)
    {
        $imagePath = public_path('upload/product') . '/' . $imageName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
