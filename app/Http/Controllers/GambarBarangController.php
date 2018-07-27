<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gambar_Barang;
use Auth;
class GambarBarangController extends Controller
{
  public function halamanProduk(){
    return view('halaman_produk');
  }

 public function Produk(){
   return view('produk');
 }
 public function daftar_gambar($id_barang){
   //get nama gambar sesuai dengan id gambar
   $gambar_barang=new Gambar_Barang;
   $gambar_barang=$gambar_barang->getData($id_barang);
   return view('upload_gambar',compact('id_barang','gambar_barang'));
 }
 public function tambah_gambar(Request $request){
   //mendapatkan data gambar
   $gambar=$request->file('gambar');
   //nama file = NamaUser_Waktu.ext *jpg/png
   $namafile=Auth::user()->name.'_'.time().'.'.$gambar->getClientOriginalExtension();
   //tujuan folder file
   $path = public_path('gambar/');
   //pindahin data dari komputer client ke server
   $gambar->move($path,$namafile);
   //simpan nama file di database.
   $gambar_barang=new Gambar_Barang;
   $gambar_barang->tambah_gambar_ke_DB($request->id_barang,$namafile);
   return $this->daftar_gambar($request->id_barang);
 }
 public function CekTombolGambar(Request $request){
   if($request->lihat==1){
     return redirect('/gambar/'.$request->nama_gambar);
   }else if($request->delete==1){
     //Delete file di folder public
     $file=public_path().'/gambar/'.$request->nama_gambar;
     \File::delete($file);
     $gambar_barang=new Gambar_Barang;
     $gambar_barang->hapus($request->nama_gambar);
     return $this->daftar_gambar($request->id_barang);
   }
 }
}
