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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_project');
            $table->string('provinsi_id', 10);
            $table->string('kota_id', 10);
            $table->string('kecamatan_id', 10);
            $table->string('kelurahan_id', 10);
            $table->string('latitude');
            $table->string('longitude');

            $table->foreign('id_project')->references('id')->on('projects');

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
