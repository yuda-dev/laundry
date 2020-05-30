@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 3 )

@if (\Auth::user()->is_vertifikasi == 0)
<div class="card-body">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>
        <h5><i class="icon fas fa-ban"></i> Maaf </h5>
        ID Member anda belum tervertifikasi, <br>
        Silahkan hubungi Admin atau Karyawan untuk melakukan pembayaran sebesar Rp. 50.000 / 6 Bulan, <br>
        sehingga proses ID Member anda dapat digunakan. Terimakasih!<br>
        </center>
    </div>
</div> 
@else
<div class="card-body">
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>
        <h5><i class="fa fa-thumbs-up"></i> Horeee</h5>
        ID Member anda sudah TERVERTIFIKASI, <br>
        Selamat menikmati potongan Rp.1,000 setiap melaukan transaksi, <br>
        Jangan memberikan atau memberitahu ID Member anda kepada orang lain,<b>
        ID Member berlaku selama 6 bulan. Terimakasih!<br>
        </center>
    </div>
</div> 
@endif
  
@else
<!-- Small boxes (Stat box) -->
<div class="row" style="margin-top: 20px">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ count($transaksi) }}</h3>

                <p>Transaksi</p>
            </div>
            <div class="icon">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="{{ url('transaksi') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ count($user) }}<sup style="font-size: 20px"></sup></h3>

                <p>User</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{ url('member') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ count($costumer) }}</h3>

                <p>Costumer</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-secret"></i>
            </div>
            <a href="{{ url('costumer') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<!-- /.row -->
@endif

@endsection
