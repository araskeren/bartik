<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Profil extends Model
{
  protected $table='profil';

  protected $fillable=['alamat','no_telp'];
  public function user_id(){
    return $this->belongsTo(User::class,'id_profile');
  }
  
  public function tambahatausave($id,$request){
    $data=$this->where('id_profile',$id)->first();
    if($data!=null){
      $this->where('id_profile',$id)->update([
        'alamat'=>$request->alamat_profil,
        'no_telp'=>$request->no_telp
      ]);
    }else{
      $this->id_profile=Auth::id();
      $this->alamat=$request->alamat_profil;
      $this->no_telp=$request->no_telp;
      $this->save();
    }
  }
  public function getData($id){
     return $this->where('id_profile','=',$id)->first();
  }
}
