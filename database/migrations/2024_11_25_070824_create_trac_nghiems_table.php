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
        Schema::create('trac_nghiems', function (Blueprint $table) {
            $table->id();
            $table->string('cau_hoi');
            $table->string('dap_an_1');
            $table->string('dap_an_2');
            $table->string('dap_an_3');
            $table->string('dap_an_4');
            $table->integer('dap_an_dung');
            $table->integer('tinh_trang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trac_nghiems');
    }
};
