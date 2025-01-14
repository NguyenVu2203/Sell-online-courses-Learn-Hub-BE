<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('loai_khoa_hocs', function (Blueprint $table) {
            $table->integer('gia_ban')->default(0);
            $table->integer('gia_goc')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loai_khoa_hocs', function (Blueprint $table) {
            //
        });
    }
};
