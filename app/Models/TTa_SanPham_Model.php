<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTa_SanPham_Model extends Model
{
    use HasFactory;
    protected $table ="tta__san_pham";

   // Các cột có thể được gán giá trị đại diện cho các trường trong bảng
   protected $fillable = [
                    'ttaMaSanPham',
                    'ttaTenSanPham',
                    'ttaHinhAnh',
                    'ttaSoLuong',
                    'ttaDonGia',
                    'ttaMaloai',
                    'ttaTrangThai',
                ];

    // Đảm bảo không sử dụng timestamps nếu bạn không có cột created_at và updated_at
        public $timestamps = false;
}
