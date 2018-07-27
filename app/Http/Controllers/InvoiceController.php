<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\BantuTransaksi;
use Fpdf;
use Carbon\Carbon;
class InvoiceController extends Controller
{
    public function pembelian($id){
      $transaksi=new Transaksi;
      $bantu_transaksi= new BantuTransaksi;
      $transaksi=$transaksi->getById($id);
      $bantu_transaksi=$bantu_transaksi->getAll($id);
      $pdf = new Fpdf;

      #setting judul laporan dan header tabel
      $judul = "Invoice Pembelian BARANG ANTIK";
      $header = array(
        array("label"=>"No", "length"=>10, "align"=>"C"),
        array("label"=>"Nama Barang", "length"=>70, "align"=>"C"),
        array("label"=>"Harga", "length"=>50,"align"=>"C"),
        array("label"=>"Jumlah", "length"=>30, "align"=>"C"),
      );
      $no=0;
      $hargabarang=0;
      $jumlahbarang=0;
      foreach($bantu_transaksi as $i){
        $data[] = array(
          array("label"=>$no+1, "length"=>10, "align"=>"C"),
          array("label"=>$i->barang->nama_barang, "length"=>70, "align"=>"C"),
          array("label"=>'Rp.'.$i->barang->harga, "length"=>50,"align"=>"C"),
          array("label"=>'1', "length"=>30, "align"=>"C"),
        );
        $hargabarang+=$i->barang->harga;
        $jumlahbarang++;
        $no++;
      }
      $total=array(
        array("label"=>'', "length"=>10, "align"=>"C"),
        array("label"=>'Total', "length"=>70, "align"=>"C"),
        array("label"=>'Rp.'.$hargabarang, "length"=>50,"align"=>"C"),
        array("label"=>$jumlahbarang, "length"=>30, "align"=>"C"),
      );
      $pdf::AddPage();
      $pdf::SetFont('Arial','B',30);
      $pdf::Cell(0,20, $judul, '0', 1, 'C');
      $pdf::SetFont('Arial','B',25);
      $pdf::Cell(0,20, 'Nomer Invoice      :'.$transaksi->id, '0', 1, 'L');
      $pdf::Cell(0,20, 'Tanggal Invoice    : '.Carbon::parse($transaksi->created_at)->format('l, d F Y'), '0', 1, 'L');
      $pdf::SetFont('Arial','','20');
      $pdf::Cell(0,10, 'Nama                         : '.$transaksi->user_id->name, '0', 1, 'L');
      $pdf::Cell(0,10, 'Email                         : '.$transaksi->user_id->email, '0', 1, 'L');
      $pdf::Cell(0,10, 'Metode Pembayaran : '.$transaksi->metode_pembayaran, '0', 1, 'L');
      $pdf::Cell(0,10, 'Total Pembayaran     : '.$transaksi->total_pembayaran, '0', 1, 'L');
      $pdf::Cell(0,10, 'Status Pembayaran   : '.$transaksi->status_pembayaran, '0', 1, 'L');
      $pdf::Cell(0,10, 'Status Pemesanan    : '.$transaksi->status_pemesanan, '0', 1, 'L');
      $pdf::Cell(0,10, 'Nomer Resi                : '.$transaksi->no_resi, '0', 1, 'L');
      // if($transaksi->status_pembayaran==0){
      //   $pdf::Cell(0,10, 'Status Pembayaran : Belum Terbayar', '0', 1, 'L');
      // }else{
      //   $pdf::Cell(0,10, 'Status Pembayaran : Terbayar', '0', 1, 'L');
      //   $pdf::Cell(0,10, 'Tanggal Konfirmasi Pembayaran :'.Carbon::parse($transaksi->tanggal_konfirmasi)->format('l, d F Y'), '0', 1, 'L');
      // }

      $pdf::Ln();
      $pdf::SetFillColor(255,0,0);
      $pdf::SetTextColor(255);
      $pdf::SetDrawColor(128,0,0);
      foreach ($header as $kolom) {
        $pdf::Cell($kolom['length'], 10, $kolom['label'], 1, '0',$kolom['align'], true);
      }
      $pdf::Ln();
      $pdf::SetFillColor(224,235,255);
      $pdf::SetTextColor(0);
      $fill=false;
      foreach ($data as $i) {
        foreach($i as $kolom){
          $pdf::Cell($kolom['length'], 10, $kolom['label'], 1, '0',$kolom['align'], true);
        }
        $pdf::Ln();
      }
      foreach ($total as $kolom) {
        $pdf::Cell($kolom['length'], 10, $kolom['label'], 1, '0',$kolom['align'], true);
      }
      $pdf::SetFont("Arial","",10);
      $pdf::Output();
      exit;
    }
}
