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
        Schema::create('foto_mobil_komparasi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gambar', 15)->unique();
            //Jenis
            $table->bigInteger('kode_jenis_mobil1')->unsigned();
            $table->bigInteger('kode_jenis_mobil2')->unsigned();
            $table->bigInteger('kode_jenis_mobil3')->unsigned()->nullable();
            $table->bigInteger('kode_jenis_mobil4')->unsigned()->nullable();
            //Mesin
            $table->bigInteger('kode_mesin_mobil1')->unsigned();
            $table->bigInteger('kode_mesin_mobil2')->unsigned();
            $table->bigInteger('kode_mesin_mobil3')->unsigned()->nullable();
            $table->bigInteger('kode_mesin_mobil4')->unsigned()->nullable();
            //Plat Nomor
            $table->bigInteger('plat_nomor_mobil1')->unsigned();
            $table->bigInteger('plat_nomor_mobil2')->unsigned();
            $table->bigInteger('plat_nomor_mobil3')->unsigned()->nullable();
            $table->bigInteger('plat_nomor_mobil4')->unsigned()->nullable();
            //Merek
            $table->bigInteger('merek_mobil1')->unsigned();
            $table->bigInteger('merek_mobil2')->unsigned();
            $table->bigInteger('merek_mobil3')->unsigned()->nullable();
            $table->bigInteger('merek_mobil4')->unsigned()->nullable();
            //Ukuran Karakter
            $table->bigInteger('ukuran_karakter_mobil1')->unsigned();
            $table->bigInteger('ukuran_karakter_mobil2')->unsigned();
            $table->bigInteger('ukuran_karakter_mobil3')->unsigned()->nullable();
            $table->bigInteger('ukuran_karakter_mobil4')->unsigned()->nullable();
            //Setir
            $table->bigInteger('letak_setir_mobil1')->unsigned();
            $table->bigInteger('letak_setir_mobil2')->unsigned();
            $table->bigInteger('letak_setir_mobil3')->unsigned()->nullable();
            $table->bigInteger('letak_setir_mobil4')->unsigned()->nullable();
            //Lain-lain
            $table->bigInteger('id_penggungah')->unsigned();
            $table->timestamps();

            //Foreign Key Jenis
            $table->foreign('kode_jenis_mobil1')->references('id')->on('jenis');
            $table->foreign('kode_jenis_mobil2')->references('id')->on('jenis');
            $table->foreign('kode_jenis_mobil3')->references('id')->on('jenis');
            $table->foreign('kode_jenis_mobil4')->references('id')->on('jenis');
            //Foreign Key Mesin
            $table->foreign('kode_mesin_mobil1')->references('id')->on('mesin');
            $table->foreign('kode_mesin_mobil2')->references('id')->on('mesin');
            $table->foreign('kode_mesin_mobil3')->references('id')->on('mesin');
            $table->foreign('kode_mesin_mobil4')->references('id')->on('mesin');
            //Foreign Key Plat Nomor
            $table->foreign('plat_nomor_mobil1')->references('id')->on('plat_nomor');
            $table->foreign('plat_nomor_mobil2')->references('id')->on('plat_nomor');
            $table->foreign('plat_nomor_mobil3')->references('id')->on('plat_nomor');
            $table->foreign('plat_nomor_mobil4')->references('id')->on('plat_nomor');
            //Foreign Key Merek
            $table->foreign('merek_mobil1')->references('id')->on('merk');
            $table->foreign('merek_mobil2')->references('id')->on('merk');
            $table->foreign('merek_mobil3')->references('id')->on('merk');
            $table->foreign('merek_mobil4')->references('id')->on('merk');
            //Foreign Key Ukuran Karakter
            $table->foreign('ukuran_karakter_mobil1')->references('id')->on('ukuran_karakter');
            $table->foreign('ukuran_karakter_mobil2')->references('id')->on('ukuran_karakter');
            $table->foreign('ukuran_karakter_mobil3')->references('id')->on('ukuran_karakter');
            $table->foreign('ukuran_karakter_mobil4')->references('id')->on('ukuran_karakter');
            //Foreign Key Letak Setir
            $table->foreign('letak_setir_mobil1')->references('id')->on('driving');
            $table->foreign('letak_setir_mobil2')->references('id')->on('driving');
            $table->foreign('letak_setir_mobil3')->references('id')->on('driving');
            $table->foreign('letak_setir_mobil4')->references('id')->on('driving');
            //Lain-Lain
            $table->foreign('id_penggungah')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_mobil_komparasi');
    }
};
