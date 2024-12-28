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
        Schema::create('tta_quantri', function (Blueprint $table) {
            $table->id();
            $table->string('ttaTaiKhoan', 255)->unique();
            $table->string('ttaMatKhau',255);
            $table->tinyInteger('ttaTrangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tta_quantri');
    }
};
