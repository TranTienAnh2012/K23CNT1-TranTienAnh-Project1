<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTtaDonGiaMuaColumnInTtaCthoadonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tta__c_t_h_o_a_d_o_n', function (Blueprint $table) {
            $table->decimal('ttaDonGiaMua', 15, 2)->change(); // Chỉnh sửa kiểu dữ liệu
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tta__c_t_h_o_a_d_o_n', function (Blueprint $table) {
            $table->float('ttaDonGiaMua')->change(); // Hoàn nguyên về kiểu dữ liệu ban đầu
        });
    }


};
