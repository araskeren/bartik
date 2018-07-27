<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JenisBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('jenis_barang', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('id_kategori')->unsigned();
      $table->foreign('id_kategori')->references('id')->on('kategori_barang')->onUpdate('cascade');
      $table->string('nama',50);
      $table->timestamps();
      });
      DB::table('jenis_barang')->insert([
            'id_kategori'=>1,
            'nama' => 'Meja',
      ]);
      DB::table('jenis_barang')->insert([
            'id_kategori'=>1,
            'nama' => 'Lemari',
      ]);
      DB::table('jenis_barang')->insert([
            'id_kategori'=>2,
            'nama' => 'Lukisan',
      ]);
      DB::table('jenis_barang')->insert([
            'id_kategori'=>2,
            'nama' => 'Jam',
      ]);
      DB::table('jenis_barang')->insert([
            'id_kategori'=>3,
            'nama' => 'Cangkir',
      ]);
      DB::table('jenis_barang')->insert([
            'id_kategori'=>3,
            'nama' => 'Piring',
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
