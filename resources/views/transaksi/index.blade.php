@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2)
<div class="row">
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                <p>
                    <button class="btn btn-warning btn-refresh"><i class="fa fa-spinner"></i></button>
                    <a href="{{ url('transaksi/add') }}" class="btn btn-primary">[ <i class="fa fa-plus"></i> Tambah ]</a>
                    <button class="btn btn-danger btn-filter"><i class="fa fa-filter"></i> Filter</button>
                    <a href="{{ url('transaksi/export') }}" class="btn btn-success"><i class="fa fa-list-alt"></i> Export</a>
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
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Paket</th>
                                <th>Jlaundry</th>
                                <th>SPaket</th>
                                <th>SPes</th>
                                <th>Spemb</th>
                                <th>Berat</th>
                                <th>GrandTot</th>
                                <th>tg.trans</th>
                                <th>tg.sels</th>
                                <th>action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$dt)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{str_limit($dt->costumer->kode,'5')}}</td>
                                <td>{{$dt->costumer->nama}}</td>
                                <td>{{str_limit($dt->paket->nama,'5')}}</td>
                                <td>{{str_limit($dt->jlaundry->nama,'5')}}</td>
                                <td>{{$dt->status_paket->nama}}</td>
                                <td>{{str_limit($dt->status_pesanan->status,'5')}}</td>
                                <td>{{$dt->status_pembayaran->status}}</td>
                                <td>{{$dt->berat}}</td>
                                <td>Rp. {{number_format($dt->total, 0)}}</td>
                                <td>{{date('d F Y', strtotime($dt->created_at))}}</td>
                                <td>{{date('d F Y', strtotime($dt->updated_at))}}</td>
                                <td>
                                    <a href="{{url('transaksi/edit',$dt->id)}}" id="edit" class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i> </a>
                                    <a href="{{url('transaksi', $dt->id)}}" id="delete" class="btn btn-sm btn-flat btn-danger btn-hapus"><i class="fa fa-trash"></i> </a>
                                    <a href="{{ url('transaksi/lihat', $dt->id) }}" target="_blank" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-eye"></i></a>
                                </td>
                                
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Paket</th>
                                <th>Jlaundry</th>
                                <th>SPaket</th>
                                <th>SPes</th>
                                <th>Spemb</th>
                                <th>Berat</th>
                                <th>GrandTot</th>
                                <th>tg.trans</th>
                                <th>tg.sels</th>
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-filter').click(function(e){
                e.preventDefault();

                $('#modal-filter').modal();
            })
        })
    </script>
@endsection
