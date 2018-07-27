<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use Auth;
class ProfilController extends Controller
{
  public function TambahProfil(Request $request){
    $profil= new Profil;
    $id=Auth::user()->id;
    if($request->isMethod('post')){
      $profil->tambahatausave($id,$request);
    }
    $profil=$profil->getData($id);
    $user=Auth::user();
    return view('tambah_propil',compact('profil','user'));
  }
}
