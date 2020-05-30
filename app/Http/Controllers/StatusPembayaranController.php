<?php

namespace App\Http\Controllers;

use App\Model\Status_Pembayaran;
use Illuminate\Http\Request;

class StatusPembayaranController extends Controller
{
    public function index()
    {
        $title = 'Data Status Pembayaran';
        $data = Status_Pembayaran::get();
        return view('status_pembayaran.index',compact('title','data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'status' => 'required',
            'urutan' => 'required'
        ]);

        $data = new Status_Pembayaran();
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

        $data = Status_Pembayaran::find($id);
        $data->status= $request->status;
        $data->urutan= $request->urutan;
        $data->save();

        \Session::flash('sukses','Data berhasil diupdate');

        return redirect()->back();
    }


    public function delete($id)
    {
        Status_Pembayaran::find($id)->delete();

        \Session::flash('sukses','Data berhasil di hapus');

        return redirect()->back();
    }
}
