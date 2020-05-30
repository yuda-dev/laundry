<?php

namespace App\Http\Controllers;

use App\Model\Status_Pesanan;
use App\Model\Transaksi;
use App\Notifications\NewStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class StatusPesananController extends Controller
{
    public function index()
    {
        $title = 'Data Status Pesanan';
        $data = Status_Pesanan::get();
        return view('status_pesanan.index',compact('title','data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'status' => 'required',
            'urutan' => 'required'
        ]);

        $data = new Status_Pesanan();
        $data->status= $request->status;
        $data->urutan= $request->urutan;
        $data->save();

        \Session::flash('sukses','Data berhasil ditambahkan');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'status' => 'required',
            'urutan' => 'required'
        ]);

        $data = Status_Pesanan::find($id);
        $data->status= $request->status;
        $data->urutan= $request->urutan;
        $data->save();

        \Session::flash('sukses','Data berhasil diupdate');

        return redirect()->back();
    }


    public function delete($id)
    {
        Status_Pesanan::find($id)->delete();

        \Session::flash('sukses','Data berhasil di hapus');

        return redirect()->back();
    }

}
