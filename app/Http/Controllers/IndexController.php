<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gambar_Barang;
use App\Barang;
class IndexController extends Controller
{
  public function Home(){
    $barang = new Barang;
    $barang=$barang->limit(12)->inRandomOrder()->get();
    $gambar_barang=new Gambar_Barang;
    $gambar_barang=$gambar_barang->getAllUnique();
    return view('index',compact('barang','gambar_barang'));
  }
}
