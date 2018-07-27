<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Checkout;
use App\Barang;
use App\Jasa_Pengiriman;
use App\Profil;
use Auth;
class CheckoutController extends Controller
{

  public function checkout(){
  $cekout= new Checkout;
  $jasapengiriman=new Jasa_Pengiriman;
  $profil=new Profil;
  $cekout=$cekout->getData(Auth::user()->id);
  $jasapengiriman=$jasapengiriman->getData();
  $profil=$profil->getData(Auth::user()->id);
   return view('Checkout',compact('cekout','jasapengiriman','profil'));
  }

  public function Pembayaran(){
   return view('pembayaran');
  }
  public function cancel($id){
    $cekout= new Checkout;
    $cekout->where('id',$id)->delete();
    return redirect()->back();
  }
  public function tambahCheckout(Request $request){
    if($request->isMethod('post')){
      $cekout=new Checkout;
      $cekout->tambahcheckout(Auth::user()->id,$request->id_produk,$request->qty);
    }
    return redirect('/checkout');
  }

}
