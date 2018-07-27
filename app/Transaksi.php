<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;

class Transaksi extends Model
{
  protected $table='transaksi';

  protected $fillable=['id_user','jenis','id_penjual','id_jasapengiriman','metode_pembayaran','total_pembayaran','status_pembayaran','no_resi','created_at'];

  public function user_id(){
    return $this->belongsTo(User::class,'id_user');
  }

  public function tambahData(Request $request,$id_user){
    $this->id_user=$id_user;
    $this->id_penjual=$request->id_penjual;
    $this->id_jasapengiriman=$request->kurir;
    $this->metode_pembayaran=$request->pembayaran;
    $this->total_pembayaran=$request->total;
    $this->status_pembayaran='Belum Terbayar';
    $this->status_pemesanan='Belum diproses';
    $this->no_resi='Belum diproses';
    $this->save();
  //  $this->status_pembayaran=$request->
  }
  public function getByUser($id){
    return $this->where('id_user','=',$id)->get();
  }
  public function getAll(){
    return $this->orderBy('created_at','desc')->get();
  }
  public function getById($id){
    return $this->where('id',$id)->first();
  }
  public function getDataLast($id){
    return $this->where('id_user','=',$id)->orderBy('created_at','desc')->get()->first();
  }

}
