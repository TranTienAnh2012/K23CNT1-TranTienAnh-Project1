<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTtaHoaDonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tta__hoa_don', function (Blueprint $table) {
            // Thay đổi kiểu dữ liệu của trường 'ttaTongGiaTri' từ 'float' sang 'decimal'
            $table->decimal('ttaTongGiaTri', 15, 2)->change();  // 15 là tổng số chữ số, 2 là số chữ số sau dấu thập phân
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tta__hoa_don', function (Blueprint $table) {
            // Khôi phục lại kiểu dữ liệu ban đầu nếu cần thiết
            $table->float('ttaTongGiaTri')->change();
        });
    }
}
