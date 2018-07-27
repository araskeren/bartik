<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Gambar_Barang;
class Pencarian extends Controller
{
    public function index(Request $req){
      $barang = new Barang;
      $cari=$req->nama;
      $barang = $barang->getByName($cari);
      $gambar_barang=new Gambar_Barang;
      $gambar_barang=$gambar_barang->getAllUnique();

      return view('pencarian',compact('barang','gambar_barang','cari'));
    }
}
