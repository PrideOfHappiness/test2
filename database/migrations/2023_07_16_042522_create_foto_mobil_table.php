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
        Schema::create('foto_mobil', function (Blueprint $table) {
            $table->id();
            $table->string('kode_foto', 15)->unique();
            $table->bigInteger('merk_mobil')->unsigned();
            $table->string('nama_mobil', 100);
            $table->string('nama_tipe', 30)->nullable();
            $table->string('kode_bodi', 15)->nullable();
            $table->string('asal_negara', 100)->nullable();
            $table->bigInteger('plat_nomor')->unsigned();
            $table->bigInteger('jenis_mobil')->unsigned();
            $table->bigInteger('jenis_mesin')->unsigned();
            $table->bigInteger('ukuran')->unsigned();
            $table->bigInteger('letak_setir')->unsigned();
            $table->integer('part');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('merk_mobil')->references('id')->on('merk');
            $table->foreign('plat_nomor')->references('id')->on('plat_nomor');
            $table->foreign('jenis_mobil')->references('id')->on('jenis');
            $table->foreign('jenis_mesin')->references('id')->on('mesin');
            $table->foreign('ukuran')->references('id')->on('ukuran_karakter');
            $table->foreign('letak_setir')->references('id')->on('driving');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_mobil');
    }
};
