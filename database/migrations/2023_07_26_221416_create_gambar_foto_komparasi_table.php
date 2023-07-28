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
        Schema::create('gambar_foto_komparasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mobil_komparasi_id')->unsigned();
            $table->string('namaFile');
            $table->timestamps();

            $table->foreign('mobil_komparasi_id')->references('id')->on('foto_mobil_komparasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gambar_foto_komparasi');
    }
};
