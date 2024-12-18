<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ttaSanPham extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tta_loaisanpham')->insert([
            'ttaMaloai'=>'L001',
            'ttaTenLoai'=>'Cây Văn phong',
            'ttaTrangThai' => 0
        ]);
    }
}
