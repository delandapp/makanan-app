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
        Schema::table('masakans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kategori_makanan')->nullable()->after('harga');
            $table->string('estimasi', 100)->nullable()->after('harga');
            $table->foreign('id_kategori_makanan')->references('id')->on('kategori_makanans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('masakans', function (Blueprint $table) {
            $table->dropForeign(['id_kategori_makanan']);
            $table->dropColumn('estimasi');
        });
    }
};
