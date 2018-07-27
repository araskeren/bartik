<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BantuTransaksi extends Model
{
  protected $table='bantu_transaksi';

  protected $fillable=['user_id','id_barang','no_invoice'];

  public function barang(){
    return $this->belongsTo(Barang::class,'id_barang');
  }
  public function transaksi(){
    return $this->belongsTo(Transaksi::class,'no_invoice');
  }
  public function tambah($no_invoice,$barang){
    foreach($barang as $i){
      $data[]=[
        'no_invoice'=>$no_invoice,
        'id_barang'=>$i->id_barang,
      ];
    }
    $this->insert($data);
  }

  public function getAll($id){
    return $this->where('no_invoice','=',$id)->get();
  }
}
