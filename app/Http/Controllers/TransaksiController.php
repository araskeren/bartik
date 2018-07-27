<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Checkout;
use App\BantuTransaksi;
use App\Profil;
use Auth;

class TransaksiController extends Controller
{
    public function tambah(Request $request){
      //dd($request);
      $transaksi = new Transaksi;
      $transaksi->tambahData($request,Auth::user()->id);
      $transaksi = $transaksi->getDataLast(Auth::user()->id);
      $bantu_transaksi = new BantuTransaksi;
      $cekout=new Checkout;
      $data_cekout=$cekout->getData(Auth::user()->id);
      $bantu_transaksi->tambah($transaksi->id,$data_cekout);
      $cekout->hapusAll(Auth::user()->id);
      return redirect('/daftarpembelian');
    }
    public function DaftarPembelian(){
        $pembelian=new Transaksi;
        if(Auth::user()->level==1){
          $pembelian=$pembelian->getAll();
        }else{
          $id=Auth::user()->id;
          $pembelian=$pembelian->getByUser($id);
        }
        return view('daftar_pembelian',compact('pembelian'));
    }
    public function invoice(Request $request){
      $transaksi=new Transaksi;
      $pembelian=new BantuTransaksi;
      $id=$request->id;
      $transaksi=$transaksi->getById($id);
      $pembelian=$pembelian->getAll($id);
      $profil=new Profil;
      $profil=$profil->getData($transaksi->id_user);
      return view('daftar_ygdibeli',compact('pembelian','transaksi','profil'));
    }

    public function ubahstatuspembayaran(Request $request){
      $pembelian=new Transaksi;
      $pembelian->where('id','=',$request->id)->update(['status_pembayaran'=>'Sudah Terbayar']);
      return redirect()->back();
    }

    public function ubahstatuspemesanan(Request $request){
      $pembelian=new Transaksi;
      $pembelian->where('id','=',$request->id)->update(['status_pemesanan'=>'Sudah diproses']);
      return redirect()->back();
    }
    public function ubahstatusnoresi(Request $request){
      $pembelian=new Transaksi;
      $pembelian->where('id','=',$request->id)->update(['no_resi'=>'Sudah diproses']);
      return redirect()->back();
    }
    // public function invoice(){
    //   $daftarBarang=new
    // }
}
