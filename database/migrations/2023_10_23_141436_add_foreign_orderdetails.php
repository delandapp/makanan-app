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
        Schema::table('orderdetails', function (Blueprint $table) {
            $table->unsignedBigInteger('id_order')->after('id')->nullable();
            $table->foreign('id_order')->references('id')->on('orders')->onDelete('restrict');
            $table->unsignedBigInteger('id_masakan')->after('id_order')->nullable();
            $table->foreign('id_masakan')->references('id')->on('masakans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orderdetails', function (Blueprint $table) {
            //
        });
    }
};
