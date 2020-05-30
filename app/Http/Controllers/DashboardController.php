<?php

namespace App\Http\Controllers;

use App\Member;
use App\Model\Costumer;
use App\Model\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $transaksi = Transaksi::get();
        $user = User::get();
        $costumer = Costumer::get();
        $data = Member::get();
        return view('dashboard.index',compact('title','transaksi','user','costumer','data'));
    }
}
