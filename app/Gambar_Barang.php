<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar_Barang extends Model
{
  protected $table='gambar_barang';

  protected $fillable=['id_barang','nama_gambar'];
  public function tambah_gambar_ke_DB($id,$namafile){
    $this->id_barang=$id;
    $this->nama_gambar=$namafile;
    $this->save();
  }
  public function getData($id){
    return $this->where('id_barang','=',$id)->get();
  }
  public function getAllUnique(){
    return $this->distinct('id_barang')->get();
  }
  public function hapus($namafile){
    $this->where('nama_gambar','=',$namafile)->delete();
  }
}
