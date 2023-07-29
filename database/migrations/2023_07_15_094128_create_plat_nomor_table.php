<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plat_nomor', function (Blueprint $table) {
            $table->id();
            $table->string('kode_negara')->unique();
            $table->string('nama_negara');
            $table->enum('for', ['All Vehicles', 'Electrified Vehicles Plates', 'Non-Electrified Vehicle Plates']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plat_nomor');
    }
};
