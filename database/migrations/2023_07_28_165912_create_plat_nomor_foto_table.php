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
        Schema::create('plat_nomor_foto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plat_id')->unsigned();
            $table->string('namaFile');
            $table->timestamps();

            $table->foreign('plat_id')->references('id')->on('plat_nomor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plat_nomor_foto');
    }
};
