<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis_Barang;
use App\Kategori_Barang;
class jenisController extends Controller
{
    public function index(Request $req){
      $jenis=new Jenis_Barang;
      $kategori=new Kategori_Barang;
      if($req->isMethod('post')){
        $jenis->tambah($req);
      }
      $kategori=$kategori->getAll();
      $data=$jenis->getAll();
      return view('tambah_jenis',compact('data','kategori'));
    }
    public function ubah($id,Request $req){
      $jenis=new Jenis_Barang;
      $kategori=new Kategori_Barang;
      if($req->isMethod('post')){
        $jenis->ubah($id,$req);
        return redirect('/jenis');
      }
      $kategori=$kategori->getAll();
      $data=$jenis->getAll();
      $jenis=$jenis->getById($id);
      return view('edit_jenis',compact('data','kategori','jenis'));
    }
    public function hapus($id){
      $jenis=new Jenis_Barang;
      $jenis->where('id',$id)->delete();
      return redirect()->back();
    }
}
