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
        Schema::table('saldos', function (Blueprint $table) {
            $table->string('kode_otp', 8)->nullable()->after('saldo');
            $table->timestamp('expired_otp')->nullable()->after('kode_otp');       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('saldos', function (Blueprint $table) {
            //
        });
    }
};
