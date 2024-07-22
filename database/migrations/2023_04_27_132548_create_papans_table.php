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
        Schema::create('papans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_papan');
            $table->string('slug');
            $table->integer('harga_sewa');
            $table->text('gambar');
            $table->string('ukuran_papan');
            $table->string('status');
            $table->string('latar');
            $table->text('deskripsi');
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
        Schema::dropIfExists('papans');
    }
};
