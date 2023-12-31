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
        Schema::create('ukuran_karakter', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique();
            $table->enum('ukuran', ['Pendek', 'Panjang']);
            $table->string('namaFile');
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
        Schema::dropIfExists('ukuran_karakter');
    }
};
