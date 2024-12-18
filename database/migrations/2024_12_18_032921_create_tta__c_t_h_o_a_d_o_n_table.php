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
        Schema::create('tta__c_t_h_o_a_d_o_n', function (Blueprint $table) {
            $table->id();
           
            $table->integer('ttaHoaDonID')->reference('id')->on('tta__hoa_don');
            $table->integer('ttaSanPhamID')->reference('id')->on('tta__san_pham');
            $table->integer('ttaSoLuongMua');
            $table->float('ttaDonGiaMua');
            $table->float('ttaThanhTien');
            $table->tinyInteger('ttattaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tta__c_t_h_o_a_d_o_n');
    }
};
