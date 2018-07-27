<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa_Pengiriman extends Model
{
  protected $table='jasa_pengiriman';

  protected $fillable=['user_id','jenis','paket','harga_kilo'];
  // public function tambahJasakirim(Request $request){
  //   $this->id_user=$user_id;
  //   $this->id_barang=$id_barang;
  //   $this->qty=$qty;
  //   $this->save();
  // }
  public function getData(){
    return $this->get();
  }
}
