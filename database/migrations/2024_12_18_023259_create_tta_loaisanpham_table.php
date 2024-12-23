<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tta_loaisanpham', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->string('ttaMaloai')->unique(); // Cột mã loại sản phẩm
            $table->string('ttaTenLoai'); // Cột tên loại sản phẩm
            $table->boolean('ttaTrangThai'); // Cột trạng thái
            $table->timestamps(); // Cột tạo mới và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tta_loaisanpham');
    }
};
