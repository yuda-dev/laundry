<?php

namespace App\Http\Controllers;

use App\Model\Diskon;
use Illuminate\Http\Request;

class DiskonController extends Controller
{
    public function index()
    {
        $title = 'Diskon';
        $data = Diskon::get();
        return view ('diskon.index',compact('title','data'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $data = new Diskon();
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

        $data = Diskon::find($id);
        $data->nama= $request->nama;
        $data->harga= $request->harga;
        $data->save();

        \Session::flash('sukses','Data berhasil diupdate');

        return redirect()->back();
    }


    public function delete($id)
    {
        Diskon::find($id)->delete();

        \Session::flash('sukses','Data berhasil di hapus');

        return redirect()->back();
    }

}
