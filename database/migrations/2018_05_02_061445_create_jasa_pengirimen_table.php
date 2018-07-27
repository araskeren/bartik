<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJasaPengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_pengiriman', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis',50);
            $table->string('paket',50);
            $table->integer('harga_kilo')->unsigned();
            $table->timestamps();
        });
        DB::table('jasa_pengiriman')->insert([
              'jenis' => 'JNE',
              'paket' => 'Reguler',
              'harga_kilo' => 10000,
        ]);
        DB::table('jasa_pengiriman')->insert([
              'jenis' => 'JNE',
              'paket' => 'YES',
              'harga_kilo' => 18000,
        ]);
        DB::table('jasa_pengiriman')->insert([
              'jenis' => 'J&T',
              'paket' => 'Reguler',
              'harga_kilo' => 15000,
        ]);
        DB::table('jasa_pengiriman')->insert([
              'jenis' => 'TIKI',
              'paket' => 'Reguler',
              'harga_kilo' => 14000,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jasa_pengiriman');
    }
}
