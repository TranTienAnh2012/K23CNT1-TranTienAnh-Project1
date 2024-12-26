<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TTA_loai_san_pham extends Model
{
    use HasFactory;

    protected $table ='tta_loaisanpham';

    protected $fillable = ['ttaTaiKhoan', 'ttaMatKhau', 'ttaTrangThai']; // Khai báo các cột có thể thao tác
    
}
