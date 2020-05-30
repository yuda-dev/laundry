<?php

namespace App\Http\Controllers;

use App\Model\Costumer;
use App\Notifications\NewCostumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class CostumerController extends Controller
{
    public function index()
    {
        $title = 'Data Costumer';
        $data = Costumer::orderBy('created_at','desc')->get();
        $kode = date('mdHis');
        return view('costumer.index', compact('title','data','kode'));
    }

    public function store(Request $request)
    {
        $data = new Costumer();
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->status_paket = $request->status_paket;
        $data->alamat = $request->alamat;
        $data->kode = $request->kode;
        $data->id_member = $request->id_member;
        $data->save();

        $costumers = Costumer::all();
        foreach ($costumers as $cs)
        {
            Notification::route('mail',$cs->email)
                ->notify(new NewCostumer($data));
        }

        \Session::flash('sukses','Data berhasil ditambahkan');

        return redirect()->back();
    }

    public function delete($id)
    {
        Costumer::find($id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');

        return redirect()->back();
    }
}
