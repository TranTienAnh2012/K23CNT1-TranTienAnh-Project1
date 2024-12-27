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
            $table->string('ttaMaHoaDon', 255)->unique(); // Mã hóa đơn
            $table->unsignedBigInteger('ttaMakhachhang'); // Mã khách hàng
            $table->foreign('ttaMakhachhang')            // Thiết lập khóa ngoại
                ->references('id')                     // Tham chiếu tới cột `id`
                ->on('tta__khach__hang')               // Thuộc bảng `tta__khach__hang`
                ->onDelete('cascade');                 // Tự động xóa bản ghi liên quan khi xóa khách hàng
            $table->date('ttaNgayHoaDon');               // Ngày hóa đơn
            $table->string('ttaHotenKhachHang', 255);    // Họ tên khách hàng
            $table->string('ttaEmail', 255);             // Email khách hàng
            $table->string('ttaDienThoai', 255);         // Số điện thoại
            $table->string('ttaDiaChi', 255);            // Địa chỉ
            $table->float('ttaTongGiaTri');              // Tổng giá trị hóa đơn
            $table->tinyInteger('ttaTrangThai');         // Trạng thái hóa đơn
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
