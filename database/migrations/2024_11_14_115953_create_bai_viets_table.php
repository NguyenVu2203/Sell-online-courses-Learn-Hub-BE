<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de');
            $table->string('slug_tieu_de');
            $table->string('hinh_anh');
            $table->text('mo_ta_ngan');
            $table->longText('noi_dung');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bai_viets');
    }
};
