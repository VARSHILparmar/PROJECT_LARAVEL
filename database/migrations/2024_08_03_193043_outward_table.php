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
        Schema::create('outwards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Vendor');
            $table->foreign('Vendor')->references('id')->on('Vendors');
            $table->dateTime('Date_Time');
            $table->unsignedBigInteger('Quality');
            $table->foreign('Quality')->references('id')->on('Qualitys');
            $table->integer('Meter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outwards');
    }
};
