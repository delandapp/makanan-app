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
        Schema::create('details_transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->integer('nominal')->unsigned()->nullable();
            $table->string('status', 100)->nullable()->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_transfers');
    }
};
