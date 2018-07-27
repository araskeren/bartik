<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Kategori_Barang extends Model
{
  protected $table='kategori_barang';

  protected $fillable=['nama'];
  public function getAll(){
    return $this->get()->all();
  }
  public function getData($id){
     return $this->where('id','=',$id)->get()->first();
  }
  public function tambah(Request $request){

    $this->nama=$request->nama;
    $this->save();
  }
  public function ubah($id,$data){
    $this->where('id',$id)->update([
      'nama'=>$data->nama,
    ]);
  }
}
