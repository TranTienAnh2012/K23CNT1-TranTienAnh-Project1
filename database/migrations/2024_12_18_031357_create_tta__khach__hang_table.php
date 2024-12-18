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
        Schema::create('tta__khach__hang', function (Blueprint $table) {
            $table->id();
            $table->string('ttaMakhachhang',255)->unique();
            $table->string('ttaHotenkhachhang',255);
            $table->string('ttaEmail',255);
            $table->string('ttaDienThoai',255);
            $table->string('ttaDiaChi',255);
            $table->date('ttaNgayDK');
            $table->tinyInteger('ttaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tta__khach__hang');
    }
};
