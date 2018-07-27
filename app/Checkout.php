<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Barang;
use App\Gambar_Barang;
class Checkout extends Model
{
  protected $table='checkout';

  protected $fillable=['id_user','id_barang'];

  public function barang(){
    return $this->belongsTo(Barang::class,'id_barang');
  }
  public function tambahcheckout($user_id,$id_barang,$qty){
    $this->id_user=$user_id;
    $this->id_barang=$id_barang;
    $this->qty=$qty;
    $this->save();
  }
  public function getData($id){
    return $this->where('id_user','=',$id)->get();
  }
  public function hapus($id){
    return $this->where('id','=',$id)->delete();
  }
  public function hapusAll($id_user){
    // $data=$this->getData($id_user);
    // foreach($data as $i){
    //   $this->find($i->id)-delete();
    // }
    $this->where('id_user','=',$id_user)->delete();
  }
}
