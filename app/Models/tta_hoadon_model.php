<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tta_hoadon_model extends Model
{
    use HasFactory;
    protected $table ="tta__hoa_don";
    
    // Đảm bảo không sử dụng timestamps nếu bạn không có cột created_at và updated_at
    public $timestamps = false;
     // Các cột có thể được gán giá trị đại diện cho các trường trong bảng
   protected $fillable = [
    'ttaMaHoaDon',
    'ttaMakhachhang',
    'ttaNgayHoaDon',
    'ttaHotenKhachHang',
    'ttaEmail',
    'ttaDienThoai',
    'ttaDiaChi',
    'ttaTongGiaTri',
    'ttaTrangThai',
];
}
