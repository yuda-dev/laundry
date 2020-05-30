<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VertifikasiController extends Controller
{
    public function update(Request $request)
    {
        $this->validate($request,[
            'id_pendaftaran' => 'required',
        ]);

        $id = $request->id_pendaftaran;
        $cek = User::where('id_member',$id)->count();

        if($cek > 0)
        {
            User::where('id_member',$id)->update([
                'is_vertifikasi' => 1
            ]);

            \Session::flash('sukses','Member Sudah di Vertifikasi');
        } else {
            \Session::flash('gagal','ID Member tidak ditemukan');
        }
        
        return redirect()->back();
    }
}
