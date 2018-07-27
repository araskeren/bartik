<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori_Barang;
use App\Jenis_Barang;
use App\Gambar_Barang;
use Auth;
use App\Http\Controllers\GambarBarangController;
class BarangController extends Controller
{
  public function kategori(){
      return $this->hasOne('App\Kategori_Barang');
  }
  public function jenis(){
      return $this->hasOne('App\Jenis_Barang');
  }
  public function tambahproduk(Request $request){
    if($request->isMethod('post')){
      $barang=new Barang;
      $barang->tambah($request);
      $id_barang=$barang->getDataLast()->id;
      //mendapatkan data gambar
      $gambar=$request->file('images');
      //nama file = NamaUser_Waktu.ext *jpg/png
      $namafile=Auth::user()->name.'_'.time().'.'.$gambar->getClientOriginalExtension();
      //tujuan folder file
      $path = public_path('gambar/');
      //pindahin data dari komputer client ke server
      $gambar->move($path,$namafile);
      //simpan nama file di database.
      $gambar_barang=new Gambar_Barang;
      $gambar_barang->tambah_gambar_ke_DB($id_barang,$namafile);

    }
    $kategori=new Kategori_Barang;
    $kategori=$kategori->getAll();
    $jenis=new Jenis_Barang;
    $jenis=$jenis->getAll();

  //  dd($kategori);
    return view('tambah',compact('kategori','jenis','gambar'));
  }

  public function UbahBarang(){
   return view('ubahbarang');
   }

  public function daftarbarang(){
    $barang = new Barang;
    $data_barang=$barang->getAll();
    // $gambar= new Gambar_Barang;
    // $gambar_barang->$gambar->getData();
    //dd($data_barang);
    return view('daftar_barang',compact('data_barang'));
   }

  public function CekTombol(Request $request){
    if($request->ubah==1){
      return $this->EditBarang($request);
    }else if ($request->lihat==1) {
      return $this->LihatBarang($request);
    }else if($request->hapus==1){
      return $this->DeleteData($request);
    }else if($request->tambah_gambar==1){
      $gambar=new GambarBarangController;
      return $gambar->daftar_gambar($request->id);
    }
  }
  public function EditBarang(Request $request){
    $barang= new Barang;
    $data_barang=$barang->getData($request->id);
    $kategori=new Kategori_Barang;
    $kategori=$kategori->getAll();
    $jenis=new Jenis_Barang;
    $jenis=$jenis->getAll();
    //dd($data_barang);
    return view('ubahbarang',compact('data_barang','kategori','jenis'));
  }
  public function LihatBarang(Request $request){
    $barang= new Barang;
    $data_barang=$barang->getData($request->id);
    $kategori=new Kategori_Barang;
    $kategori=$kategori->getAll();
    $jenis=new Jenis_Barang;
    $jenis=$jenis->getAll();
    //get data gambar Produk
    $gambar_barang=new Gambar_Barang;
    $gambar_barang=$gambar_barang->getData($request->id);
    return view('halaman_produk',compact('data_barang','kategori','jenis','gambar_barang'));
  }
  public function coba($id){
    $barang= new Barang;
    $data_barang=$barang->getData($id);
    $kategori=new Kategori_Barang;
    $kategori=$kategori->getAll();
    $jenis=new Jenis_Barang;
    $jenis=$jenis->getAll();
    //get data gambar Produk
    $gambar_barang=new Gambar_Barang;
    $gambar_barang=$gambar_barang->getData($id);
    return view('halaman_produk',compact('data_barang','kategori','jenis','gambar_barang'));
  }
  public function saveDataEdit(Request $request){
    $barang= new Barang;
    $barang->ubah($request);
    return redirect('/daftarproduk');
  }
  public function DeleteData(Request $request){
    $barang= new Barang;
    $barang->hapus($request->id);
    return redirect('/daftarproduk');
  }


}
