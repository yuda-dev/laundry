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


Auth::routes(['verify' => true ]);

Route::get('/','HomeController@index');
Route::post('welcome/add','HomeController@store');

Route::group(['middleware'=>'auth'],function ()
{
    Route::get('dashboard','DashboardController@index')->middleware('verified');

    //Paket
    Route::get('paket','PaketController@index');
    Route::post('paket/add','PaketController@store');
    Route::put('paket/{id}','PaketController@update');
    Route::delete('paket/{id}','PaketController@delete');

    //Costumer
    Route::get('costumer','CostumerController@index');
    Route::post('costumer/add','CostumerController@store');
    Route::delete('costumer/{id}','CostumerController@delete');

    //jenis_laundry
    Route::get('jlaundry','JlaundryController@index');
    Route::post('jlaundry/add','JlaundryController@store');
    Route::put('jlaundry/{id}','JlaundryController@update');
    Route::delete('jlaundry/{id}','JlaundryController@delete');

    //Status_paket
    Route::get('status_paket','StatusPaketController@index');
    Route::post('status_paket/add','StatusPaketController@store');
    Route::put('status_paket/{id}','StatusPaketController@update');
    Route::delete('status_paket/{id}','StatusPaketController@delete');

    //Status_penanan
    Route::get('status_pesanan','StatusPesananController@index');
    Route::post('status_pesanan/add','StatusPesananController@store');
    Route::put('status_pesanan/{id}','StatusPesananController@update');
    Route::delete('status_pesanan/{id}','StatusPesananController@delete');

    //Status_pembayaran
    Route::get('status_pembayaran','StatusPembayaranController@index');
    Route::post('status_pembayaran/add','StatusPembayaranController@store');
    Route::put('status_pembayaran/{id}','StatusPembayaranController@update');
    Route::delete('status_pembayaran/{id}','StatusPembayaranController@delete');

     //Transaksi
    Route::get('transaksi','TransaksiController@index');
    Route::get('transaksi/add','TransaksiController@add');
    Route::post('transaksi/add','TransaksiController@store');
    Route::get('transaksi/edit/{id}','TransaksiController@ubah');
    Route::put('transaksi/edit/{id}','TransaksiController@update');
    Route::get('transaksi/lihat/{id}','TransaksiController@lihat');
    Route::get('transaksi/filter','TransaksiController@filter');
    Route::get('transaksi/export','TransaksiController@export');
    Route::delete('transaksi/{id}','TransaksiController@delete');


    //Member

    Route::get('member','MemberController@index');
    Route::get('member/add','MemberController@add');
    Route::post('member/add','MemberController@store');
    Route::get('member/edit/{id}','MemberController@edit');
    Route::put('member/ubahprofile','MemberController@updateprofile');
    Route::put('member/ubahpassword','MemberController@updatepassword');
    Route::get('profile','MemberController@profile');
    Route::delete('member/{id}','MemberController@delete');


    //vertifikasi member
    Route::post('vertifikasi/add','VertifikasiController@update');

     //diskon
     Route::get('diskon','DiskonController@index');
     Route::post('diskon/add','DiskonController@store');
     Route::put('diskon/{id}','DiskonController@update');
     Route::delete('diskon/{id}','DiskonController@delete');



});

Route::get('/home', function () {
    return redirect('dashboard');
});

Route::get('keluar', function () {
    \Auth::logout();
    return redirect('login');
});
