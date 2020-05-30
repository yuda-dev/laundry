<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Support\Facades\Auth;
use App\Model\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $title = 'Data Paket';
        $data = Paket::get();
        $dt = Member::find(Auth::id());
        return view('paket.index',compact('title','data','dt'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $data = new Paket();
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

        $data = Paket::find($id);
        $data->nama= $request->nama;
        $data->harga= $request->harga;
        $data->save();

        \Session::flash('sukses','Data berhasil diupdate');

        return redirect()->back();
    }


    public function delete($id)
    {
        Paket::find($id)->delete();

        \Session::flash('sukses','Data berhasil di hapus');

        return redirect()->back();
    }

}
