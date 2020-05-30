@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2)
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
            
            <!-- SELECT2 EXAMPLE -->
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <p>
                        <br>
                        <button class="btn btn-warning btn-refresh"><i class="fa fa-spinner"></i></button>
                        <a href="{{url('transaksi')}}" class="btn btn-danger"><i class="fa fa-arrow-alt-circle-left"></i></a>
                    </p>
                    <div class="card card-primary" style="margin-top: 30px">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        
                                <div class="card-body">
                                    <form role="form" method="post" action="{{url('transaksi/add')}}">
                                        @csrf
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode Transaksi</label>
                                                <select class="form-control select2" name="costumer_id" style="width: 100%;">
                                                    <option selected="selected">Pilih</option>
                                                    @foreach($costumer as $cs)
                                                        <option value="{{$cs->id}}">{{$cs->kode}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Keanggotaan</label>
                                                <select class="form-control select2" name="diskon_id" style="width: 100%;">
                                                    <option selected="selected">Pilih</option>
                                                    @foreach($diskon as $dis)
                                                        <option value="{{$dis->id}}">{{$dis->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Paket</label>
                                                <select class="form-control select2" name="paket_id" style="width: 100%;">
                                                    <option selected="selected">Pilih</option>
                                                    @foreach($paket as $pk)
                                                        <option value="{{$pk->id}}">{{$pk->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Laundry</label>
                                                <select class="form-control select2" name="jlaundry_id" style="width: 100%;">
                                                    <option>Pilih</option>
                                                    @foreach($jlaundry as $jl)
                                                        <option value="{{$jl->id}}">{{$jl->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                
                                            <div class="form-group">
                                                <label>Status Paket</label>
                                                <select class="form-control select2" name="status_paket_id" style="width: 100%;">
                                                    <option>Pilih</option>
                                                    @foreach($statuspaket as $sp)
                                                        <option value="{{$sp->id}}">{{$sp->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status Pesanan</label>
                                                <select class="form-control select2" name="status_pesanan_id" style="width: 100%;">
                                                    <option>Pilih</option>
                                                    @foreach($statuspesanan as $spn)
                                                        <option value="{{$spn->id}}">{{$spn->status}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                
                                            <div class="form-group">
                                                <label>Status Pembayaran</label>
                                                <select class="form-control select2" name="status_pembayaran_id" style="width: 100%;">
                                                    <option>Pilih</option>
                                                    @foreach($statuspembayaran as $spm)
                                                        <option value="{{$spm->id}}">{{$spm->status}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Berat / kg</label>
                                                    <input type="number" name="berat" class="form-control" placeholder="berat">
                                                </div>
                                            </div>
                                            
                                            <div class="row no-print">
                                                <div class="col-12">
                                                <button type="submit" class="btn btn-danger float-right" style="margin-right: 5px;">
                                                    <i class="fas fa-shopping-cart"></i> Save Transaksi
                                                </button>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
                
    </section>
    <!-- /.content -->
@else
<div class="card-body">
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>
        <h5><i class="icon fas fa-ban"></i> Maaf </h5>
        Halaman yang anda minta tidak ditemukan, ! <br>
        <a href="{{ url('dashboard') }}"> Kembali ke dashboard </a>
        </center>
    </div>
</div>    
@endif
   
@endsection

