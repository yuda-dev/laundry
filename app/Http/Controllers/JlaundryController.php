<?php

namespace App\Http\Controllers;

use App\Model\Jlaundry;
use Illuminate\Http\Request;

class JlaundryController extends Controller
{
    public function index()
    {
        $title = 'Data Jenis Laundry';
        $data = Jlaundry::get();
        return view('jlaundry.index', compact('title','data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $data = new Jlaundry();
        $data->nama = $request->nama;
        $data->harga = $request->harga;
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

        $data = Jlaundry::find($id);
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->save();

        \Session::flash('sukses','Data berhasil diupdate');

        return redirect()->back();
    }

    public function delete($id)
    {
        Jlaundry::find($id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');

        return redirect()->back();
    }
}
