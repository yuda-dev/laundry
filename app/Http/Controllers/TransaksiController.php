<?php

namespace App\Http\Controllers;

use App\Notifications\NewStatus;
use App\Notifications\GantiStatus;
use Illuminate\Http\Request;
use App\Model\Paket;
use App\Model\Jlaundry;
use App\Model\Status_Pesanan;
use App\Model\Status_Pembayaran;
use App\Model\Status_Paket;
use App\Model\Transaksi;
use App\Model\Costumer;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TranaksiExport;
use App\Http\Controllers\Controller;
use App\Model\Diskon;

class TransaksiController extends Controller
{
    public function index()
    {
        $title = 'Transaksi Pesanan';
        $data = Transaksi::orderBy('created_at','desc')->get();
        $costumer = Costumer::get();
        return view('transaksi.index',compact('title','data','costumer'));
    }

    public function filter(Request $request)
    {
        $title = 'Filter Tanggal';
        $dari = $request->dari;
        $sampai = $request->sampai;

        $data = Transaksi::whereDate('created_at','>=',$dari)->whereDate('created_at','<=',$sampai)->orderby('created_at','desc')->get();
        return view('transaksi.index',compact('title','data'));
    }

    public function export()
	{
        return Excel::download(new TranaksiExport, 'invoices.xlsx');
	}

    public function add()
    {
        $title = 'Tambah Transaksi Pesanan';
        $paket = Paket::get();
        $jlaundry = Jlaundry::get();
        $statuspaket = Status_Paket::get();
        $statuspesanan = Status_Pesanan::get();
        $statuspembayaran = Status_Pembayaran::get();
        $diskon = Diskon::get();
        $costumer = Costumer::orderBy('created_at','desc')->get();

        return view('transaksi.add',compact('title','jlaundry','paket','statuspesanan','diskon','statuspembayaran','statuspaket','costumer'));
    }

    public function lihat($id)
    {
        $title = 'Transaksi View';
        $dt = Transaksi::find($id);
        $tgl = date('d F Y H:i:s');
        return view('transaksi.lihat',compact('dt','tgl','title'));
    }

     public function store(Request $request)
    {
        $data = new Transaksi();
        $data->costumer_id = $request->costumer_id;
        $data->paket_id = $request->paket_id;
        $data->jlaundry_id = $request->jlaundry_id;
        $data->status_paket_id = $request->status_paket_id;
        $data->status_pesanan_id = $request->status_pesanan_id;
        $data->status_pembayaran_id = $request->status_pembayaran_id;
        $data->diskon_id = $request->diskon_id;
        $data->berat = $request->berat;

        $harga1 = Paket::find($request->paket_id);
        $harga2 = Jlaundry::find($request->jlaundry_id);
        $harga3 = Status_Paket::find($request->status_paket_id);
        $harga4 = Diskon::find($request->diskon_id);
        $harga_paket = $harga1->harga;
        $harga_jlaundry = $harga2->harga;
        $harga_status_paket = $harga3->harga;
        $harga_diskon = $harga4->harga;
        $berat = $request->berat;

        $grand_total = ($harga_paket + $harga_status_paket) + ($harga_jlaundry  * $berat) - $harga_diskon;

        $data->total = $grand_total;

        $data->save();

        $statpes = Transaksi::all();
            foreach ($statpes as $sp)
            {
                Notification::route('mail', $sp->costumer->email)
                    ->notify(new NewStatus($data));
            }

        \Session::flash('sukses','data berhasil ditambahkan');


        return redirect('transaksi');
    }

    public function ubah($id)
    {
        $title = 'Ubah Transaksi';
        $dt = Transaksi::find($id);
        $paket = Paket::get();
        $jlaundry = Jlaundry::get();
        $statuspaket = Status_Paket::get();
        $statuspesanan = Status_Pesanan::orderBy('status','asc')->get();
        $statuspembayaran = Status_Pembayaran::get();
        $costumer = Costumer::get();
        return view('transaksi.edit',compact('title','jlaundry','paket','statuspesanan','statuspembayaran','statuspaket','costumer','dt'));
    }

    public function update(Request $request, $id)

    {
        $data= Transaksi::find($id);
        $data->status_pesanan_id = $request->status_pesanan_id;
        $data->status_pembayaran_id = $request->status_pembayaran_id;
        $data->save();

        $ganti = Transaksi::all();
            foreach ($ganti as $gn)
            {
                Notification::route('mail', $gn->costumer->email)
                    ->notify(new GantiStatus($data));
            }

        \Session::flash('sukses','Status berhasil diubah');
        return redirect('transaksi');
    }

    public function delete($id)
    {
        Transaksi::find($id)->delete();

        \Session::flash('sukses','Data berhasil di hapus ');

        return redirect()->back();
    }

}
