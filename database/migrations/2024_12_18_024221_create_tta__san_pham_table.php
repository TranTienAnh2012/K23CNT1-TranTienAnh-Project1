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
        Schema::create('tta__san_pham', function (Blueprint $table) {
            $table->id();
            $table->string('ttaMaSanPham', 255)->unique();
            $table->string('ttaTenSanPham', 255);
            $table->string('ttaHinhAnh', 255)->nullable();
            $table->integer('ttaSoLuong');
            $table->float('ttaDonGia', 10, 2); // 10 số, 2 chữ số thập phân
            $table->biginteger('ttaMaloai')->references('id')->on('tta_loaisanpham');
            $table->tinyinteger('ttaTrangThai');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tta__san_pham');
    }
};
