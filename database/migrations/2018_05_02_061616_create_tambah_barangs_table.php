<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTambahBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_penjual')->unsigned();
            $table->foreign('id_penjual')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_barang',50);
            $table->integer('kategori')->unsigned;
            $table->integer('jenis')->unsigned;
            $table->bigInteger('harga')->unsigned();
            $table->integer('stok')->unsigned();
            $table->string('deskripsi',50);
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
        Schema::dropIfExists('tambah_barang');
    }
}
