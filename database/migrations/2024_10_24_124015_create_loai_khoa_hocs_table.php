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
        Schema::create('loai_khoa_hocs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khoa_hoc');
            $table->string('slug_khoa_hoc');
            $table->string('hinh_anh');
            $table->text('mo_ta_ngan');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loai_khoa_hocs');
    }
};
