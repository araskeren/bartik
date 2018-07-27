<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relasi_Pengirim extends Model
{
  protected $table='relasi_pengirim';

  protected $fillable=['user_id','id_penjual','id_jasapengiriman','created_at'];

}
