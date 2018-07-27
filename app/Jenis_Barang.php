<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_Barang extends Model
{
  protected $table='jenis_barang';

  protected $fillable=['id_kategori','nama'];
  public function kategori(){
    return $this->belongsTo(Kategori_Barang::class,'id_kategori');
  }
  public function getAll(){
    return $this->get()->all();
  }
  public function getById($id){
    return $this->where('id',$id)->first();
  }
  public function tambah($data){
    $this->id_kategori=$data->kategori;
    $this->nama=$data->nama;
    $this->save();
  }
  public function ubah($id,$data){
    $this->where('id',$id)->update([
      'id_kategori'=>$data->kategori,
      'nama'=>$data->nama,
    ]);
  }
}
