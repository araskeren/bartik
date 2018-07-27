<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Checkout;
use App\Gambar_Barang;
class Barang extends Model
{
    protected $table='barang';

    protected $fillable=['id_penjual','nama_barang','kategori','jenis','harga','stok','deskripsi'];
    public function tambah(Request $request){
      //dd($request);
      $this->id_penjual=Auth::id();
      $this->nama_barang=$request->nama_barang;
      $this->kategori=$request->kategori_barang;
      $this->jenis=$request->jenis_barang;
      $this->harga=$request->harga;
      $this->stok=$request->stok;
      $this->deskripsi=$request->deskripsi;

      $this->save();
    }
    public function getAll(){
       return $this->where('id_penjual','=',Auth::id())->get()->all();
    }
    public function getData($id){
       return $this->where('id','=',$id)->get()->first();
    }
    public function getDataLast(){
      return $this->orderBy('id', 'desc')->first();
    }
    public function getByName($nama){
      return $this->where('nama_barang','like','%'.$nama.'%')->orderBy('created_at','desc')->get();
    }
    public function ubah(Request $request){
      $this->find($request->id)->update([
        'nama_barang'=>$request->nama_barang,
        'kategori'=>$request->kategori,
        'jenis'=>$request->jenis,
        'harga'=>$request->harga,
        'stok'=>$request->stok,
        'deskripsi'=>$request->deskripsi,
      ]);
    }
    // public function hapus($id){
    //   $this->find($id)->delete();
    // }
    public function hapus($id){
      $this->where('id','=',$id)->delete();
    }

}
