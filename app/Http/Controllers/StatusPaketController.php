<?php

namespace App\Http\Controllers;

use App\Model\Status_Paket;
use Illuminate\Http\Request;

class StatusPaketController extends Controller
{
    public function index()
    {
        $title = 'Data Status Paket';
        $data = Status_Paket::get();
        return view('status_paket.index',compact('title','data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $data = new Status_Paket();
        $data->nama= $request->nama;
        $data->harga= $request->harga;
        $data->save();

        \Session::flash('sukses','Data berhasil ditambahkan');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $data = Status_Paket::find($id);
        $data->nama= $request->nama;
        $data->harga= $request->harga;
        $data->save();

        \Session::flash('sukses','Data berhasil diupdate');

        return redirect()->back();
    }


    public function delete($id)
    {
        Status_Paket::find($id)->delete();

        \Session::flash('sukses','Data berhasil di hapus');

        return redirect()->back();
    }

}
