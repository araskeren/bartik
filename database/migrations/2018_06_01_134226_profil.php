<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('profil', function (Blueprint $table) {
      $table->integer('id_profile')->unsigned();
      $table->foreign('id_profile')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
      $table->string('alamat',50);
      $table->string('no_telp',20);
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
        //
    }
}
