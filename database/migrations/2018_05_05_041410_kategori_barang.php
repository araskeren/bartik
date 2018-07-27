<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KategoriBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('kategori_barang', function (Blueprint $table) {
      $table->increments('id');
      $table->string('nama',50);
      $table->timestamps();
      });
      DB::table('kategori_barang')->insert([
            'nama' => 'Furnitur',
      ]);
      DB::table('kategori_barang')->insert([
            'nama' => 'Dapur',
      ]);
      DB::table('kategori_barang')->insert([
            'nama' => 'Dekorasi',
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
