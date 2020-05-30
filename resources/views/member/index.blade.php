@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1)
<div class="row">
    @include('vertifikasi.index')
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                <p>
                    <button class="btn btn-warning btn-refresh"><i class="fa fa-spinner"></i></button>
                    <a href="{{ url('member/add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                    <a href="{{ url('profile') }}" class="btn btn-success"><i class="fa fa-user"></i> Ganti Profile</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#vertimodal"><i class="fa fa-thumbs-up"></i> Vertifikasi</a>
                </p>
            </div>

            <div class="card">
                <div class="card-header" style="background-color: var(--blue);color: white">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="table table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>id_member</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th>photo</th>
                                <th>is_vertivikasi</th>
                                <th>action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$dt)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $dt->id_member }}</td>
                                <td>{{ $dt->name }}</td>
                                <td>{{ $dt->role->nama }}</td>
                                <td>{{ $dt->email }}</td>
                                <td>{{ $dt->photo }}</td>
                                <td>
                                    @if ($dt->is_vertifikasi == 0 )
                                        <button type="button" class="btn btn-danger btn-xs"> Belum diVertifikasi</button>
                                    @else
                                        <button type="button" class="btn btn-success btn-xs"> Sudah diVertifikasi</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('member', $dt->id)}}" id="delete" class="btn btn-sm btn-flat btn-danger btn-hapus"><i class="fa fa-trash"></i> </a>
                                </td>
                                
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>id_member</th>
                                <th>Nama</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th>photo</th>
                                <th>is_vertivikasi</th>
                                <th>action</th>
                               
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>

<div class="modal fade" id="modal-filter">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{$title}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="get" action="{{url('transaksi/filter')}}">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Dari tanggal</label>
                            <input type="date" class="form-control" name="dari"  autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Sampai tanggal</label>
                            <input type="date" class="form-control" name="sampai" autocomplete="off">
                        </div>
                        
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
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

