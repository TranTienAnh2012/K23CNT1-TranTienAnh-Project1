<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;  // Thêm dòng này để sử dụng Str
use App\Models\tta_KhachHang_model;

class HoaDonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
               // Lấy danh sách khách hàng để tạo hóa đơn
               $khachHangIds = tta_KhachHang_model::all()->pluck('id')->toArray();

               // Tạo 10 hóa đơn mẫu
               for ($i = 0; $i < 10; $i++) {
                   DB::table('tta__hoa_don')->insert([
                       'ttaMaHoaDon' => 'HD' . Str::random(8),  // Mã hóa đơn ngẫu nhiên
                       'ttaMakhachhang' => $khachHangIds[array_rand($khachHangIds)], // Lấy một khách hàng ngẫu nhiên
                       'ttaNgayHoaDon' => now()->subDays(rand(1, 30)),  // Ngày hóa đơn trong vòng 30 ngày qua
                       'ttaHotenKhachHang' => 'Khách hàng ' . Str::random(5), // Tên khách hàng ngẫu nhiên
                       'ttaEmail' => 'khachhang' . rand(1, 100) . '@gmail.com',  // Email ngẫu nhiên
                       'ttaDienThoai' => '090' . rand(1000000, 9999999),  // Số điện thoại ngẫu nhiên
                       'ttaDiaChi' => 'Địa chỉ ' . Str::random(10),  // Địa chỉ ngẫu nhiên
                       'ttaTongGiaTri' => rand(100000, 1000000),  // Tổng giá trị hóa đơn ngẫu nhiên
                       'ttaTrangThai' => rand(0, 1),  // Trạng thái hóa đơn (0 hoặc 1)
                       'created_at' => now(),
                       'updated_at' => now(),
                   ]);
         }
    }
}
