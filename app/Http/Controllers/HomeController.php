<?php

namespace App\Http\Controllers;

use App\Model\Costumer;
use App\Notifications\NewCostumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $kode = date('mdHis');
        return view('welcome',compact('kode'));
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
            Notification::route('mail', $cs->email)
                ->notify(new NewCostumer($data));
        }

        return redirect()->back()->with(['success' => 'Pesan Berhasil di Kirimkan Silahkan Cek Email untuk menerima status pesanan']);
    }
}
