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
        Schema::create('tta__hoa_don', function (Blueprint $table) {
            $table->id();
            $table->string('ttaMaHoaDon',255)->unique();
            $table->bigInteger('ttaMakhachhang')->references('id')->on('tta__khach__hang');
            $table->date('ttaNgayHoaDon');
            $table->string('ttaHotenKhachHang',255);
            $table->string('ttaEmail',255);
            $table->string('ttaDienThoai',255);
            $table->string('ttaDiaChi',255);
            $table->float('ttaTongGiaTri');
            $table->tinyInteger('ttaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tta__hoa_don');
    }
};
