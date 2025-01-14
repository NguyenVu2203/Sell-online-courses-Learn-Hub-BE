<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('bai_hocs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khoa_hoc');
            $table->string('tieu_de');
            $table->integer('bai_hoc_so');
            $table->string('link_bai_hoc');
            $table->integer('is_thu_phi');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bai_hocs');
    }
};
