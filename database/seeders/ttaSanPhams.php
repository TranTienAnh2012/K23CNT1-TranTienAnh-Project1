<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ttaSanPhams extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tta__san_pham")->insert([
            'ttaMaSanPham'=>'VP01',
            'ttaTenSanPham'=>'Cay phu quy',
            'ttaHinhAnh'=>'',
            'ttaSoLuong'=> 100,
            'ttaDonGia'=>699000,
            'ttaMaloai'=> 1,
            'ttaTrangThai'=> 0
        ]);
        DB::table("tta__san_pham")->insert([
            'ttaMaSanPham'=>'VP02',
            'ttaTenSanPham'=>'Cay dai phu quy',
            'ttaHinhAnh'=>'',
            'ttaSoLuong'=> 100,
            'ttaDonGia'=>199000,
            'ttaMaloai'=> 1,
            'ttaTrangThai'=> 0
        ]);
        DB::table("tta__san_pham")->insert([
            'ttaMaSanPham'=>'VP03',
            'ttaTenSanPham'=>'Cay Hanh Phuc',
            'ttaHinhAnh'=>'',
            'ttaSoLuong'=> 100,
            'ttaDonGia'=>899000,
            'ttaMaloai'=> 1,
            'ttaTrangThai'=> 0
        ]);
        DB::table("tta__san_pham")->insert([
            'ttaMaSanPham'=>'VP04',
            'ttaTenSanPham'=>'Cay van loc',
            'ttaHinhAnh'=>'',
            'ttaSoLuong'=> 100,
            'ttaDonGia'=>799000,
            'ttaMaloai'=> 1,
            'ttaTrangThai'=> 0
        ]);
        DB::table("tta__san_pham")->insert([
            'ttaMaSanPham'=>'PT001',
            'ttaTenSanPham'=>'Cay van loc',
            'ttaHinhAnh'=>'',
            'ttaSoLuong'=> 100,
            'ttaDonGia'=>150000,
            'ttaMaloai'=> 1,
            'ttaTrangThai'=> 0
        ]);
        DB::table("tta__san_pham")->insert([
            'ttaMaSanPham'=>'PT002',
            'ttaTenSanPham'=>'Cay truong sinh',
            'ttaHinhAnh'=>'',
            'ttaSoLuong'=> 100,
            'ttaDonGia'=>100000,
            'ttaMaloai'=> 3,
            'ttaTrangThai'=> 0
        ]);
        DB::table("tta__san_pham")->insert([
            'ttaMaSanPham'=>'PT003',
            'ttaTenSanPham'=>'Cay hanh phuc',
            'ttaHinhAnh'=>'',
            'ttaSoLuong'=> 100,
            'ttaDonGia'=>200000,
            'ttaMaloai'=> 3,
            'ttaTrangThai'=> 0
        ]);
        DB::table("tta__san_pham")->insert([
            'ttaMaSanPham'=>'PT004',
            'ttaTenSanPham'=>'Cay hoa nhai',
            'ttaHinhAnh'=>'',
            'ttaSoLuong'=> 100,
            'ttaDonGia'=>100000,
            'ttaMaloai'=> 3,
            'ttaTrangThai'=> 0
        ]);
    }
}
