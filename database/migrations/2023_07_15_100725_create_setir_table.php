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
        Schema::create('driving', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 8)->unique();
            $table->enum('location', ['LHD', 'MHD', 'RHD']);
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
        Schema::dropIfExists('setir');
    }
};
