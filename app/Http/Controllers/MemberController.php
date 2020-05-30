<?php

namespace App\Http\Controllers;

use App\Member;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $title = 'Data User';
        $data = Member::get();
        return view('member.index',compact('title','data'));
    }

    public function add()
    {
        $title = 'Tambah Data user';
        $level = Role::get();
        return view('member.add', compact('title','level'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'id_member' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = new Member();
        $data->name = $request->name;
        $data->role_id = $request->role_id;
        $data->id_member = $request->id_member;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        \Session::flash('sukses','Data berhasil ditambahkan');

        return redirect('member');
    }

    public function profile()
    {
        $title = 'Profile';
        $dt = Member::find(Auth::id());
        return view('profile',compact('title','dt'));
    }

    public function updateprofile(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
        ]);

        $data = Member::find(Auth::id());
        $data->name = $request->name;
        $data->email = $request->email;
       
        $file = $request->file('photo');
        if($file){
            $file->move('uploads', $file->getClientOriginalName());
            $data->photo =$file->getClientOriginalName();
        }
        $data->save();

        \Session::flash('sukses','Data berhasil ubah');

        return redirect()->back();
    }

    public function updatepassword(Request $request)
    {
        $this->validate($request,[
            'oldpassword' =>'required',
            'password' => 'required', 'string', 'min:8', 'confirmed'
        ]);

        $ubahPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $ubahPassword))
        {
                $user = Member::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Auth::logout();
                return redirect()->back();
        }
    }

    public function delete($id)
    {
        Member::find($id)->delete();

        \Session::flash('sukses','Data berhasil di tambahkan');

        return redirect()->back();
    }
}
