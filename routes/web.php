<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/daftarpembelian/invoice','TransaksiController@invoice');
Route::get('/invoice/{id}','InvoiceController@pembelian');
Route::get('/profile','ProfilController@TambahProfil');
Route::post('/profile','ProfilController@TambahProfil');
Route::post('/caribarang','Pencarian@index');

Route::get('/starter',function(){
  return view('starter');
});
// tampilan utama
//Route::get('/bukatoko','toko@TampilanUtama');
Route::get('/','IndexController@Home');
Route::get('/halamanproduk','GambarBarangController@halamanProduk');
Route::get('/barang/{id}','BarangController@coba');
Route::get('/tambahproduk','BarangController@tambahproduk');
Route::post('/tambahproduk','BarangController@tambahproduk');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/checkout/cancel/{id}','CheckoutController@cancel');
Route::get('/daftarproduk','BarangController@daftarbarang');
Route::get('/ubahproduk','BarangController@UbahBarang');
Route::get('/produk','GambarBarangController@Produk');
Route::get('/daftarpembelian','TransaksiController@DaftarPembelian');
Route::post('/gantistatuspembayaran','TransaksiController@ubahstatuspembayaran');
Route::post('/gantistatuspemesanan','TransaksiController@ubahstatuspemesanan');
Route::post('/gantistatusresi','TransaksiController@ubahstatusnoresi');

Route::get('/pembayaran','CheckoutController@Pembayaran');

Route::get('/kategori','KategoriController@tambahkategori');
Route::post('/kategori','KategoriController@tambahkategori');
Route::get('/kategori/ubah/{id}','KategoriController@ubah');
Route::post('/kategori/ubah/{id}','KategoriController@ubah');
Route::get('/kategori/hapus/{id}','KategoriController@hapus');

Route::get('/jenis','jenisController@index');
Route::post('/jenis','jenisController@index');
Route::get('/jenis/ubah/{id}','jenisController@ubah');
Route::post('/jenis/ubah/{id}','jenisController@ubah');
Route::get('/jenis/delete/{id}','jenisController@hapus');

Route::post('/transaksi','TransaksiController@tambah');
Route::post('/cektombol','BarangController@CekTombol');
Route::post('/cektombolKategori','KategoriController@CekTombol');
Route::post('/editbarang','BarangController@saveDataEdit');
Route::post('/tambah_gambar','GambarBarangController@tambah_gambar');
Route::post('/cektombolgambar','GambarBarangController@CekTombolGambar');
Route::post('/tambahcheckout','CheckoutController@tambahCheckout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::post('tambah_gambar','')
