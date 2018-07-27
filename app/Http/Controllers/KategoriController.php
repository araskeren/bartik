<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori_Barang;
class KategoriController extends Controller
{
  public function tambahkategori(Request $request){
    $kategori=new Kategori_Barang;
    if($request->isMethod('post')){
      $kategori->tambah($request);
    }
    $kategori=$kategori->getAll();
  return view('tambah_kategori',compact('kategori'));
  }

  public function ubah($id,Request $req){
    $kategori= new Kategori_Barang;
    if($req->isMethod('post')){
      $kategori->ubah($id,$req);
      return redirect('/kategori');
    }
    $kategori_barang=$kategori->getData($id);
    $data=$kategori->getAll();
    return view('edit_kategori',compact('kategori_barang','data'));
  }
  public function hapus($id){
    $kategori= new Kategori_Barang;
    $kategori->where('id',$id)->delete();
    return redirect('/kategori');
  }

}
