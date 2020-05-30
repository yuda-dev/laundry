@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id ==1 || \Auth::user()->role_id == 2)
<div class="row">
    @include('vertifikasi.index')
    <div class="col-md-12">
        <div class="box box-warning">
            <div class="box-header" style="margin-top: 20px;margin-left: 2px">
                <p>
                    <button class="btn btn-warning btn-refresh"><i class="fa fa-spinner"></i></button>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addmodal">[ <i class="fa fa-plus"></i> Tambah ]</a>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#vertimodal"><i class="fa fa-thumbs-up"></i> Cek Vertifikasi</a>
                </p>
            </div>

            @include('costumer.add')
            @include('costumer.edit')
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
                                <th>Nama</th>
                                <th>kode</th>
                                <th>ID Member</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Status Paket</th>
                                <th>Alamat</th>
                                <th>Pesan Tanggal</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $key=>$dt)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$dt->nama}}</td>
                                <td>{{$dt->kode}}</td>
                                <td>{{$dt->id_member}}</td>
                                <td>{{$dt->email}}</td>
                                <td>{{$dt->no_hp}}</td>
                                <td>{{ $dt->status_paket }}</td>
                                <td>{{str_limit($dt->alamat, '10')}}</td>
                                <td>{{date('d F Y', strtotime($dt->created_at))}}</td>
                                <td>
                                    <button id="edit" class="btn btn-sm btn-flat btn-success edit"><i class="fa fa-eye"></i> </button>
                                    <a href="{{url('costumer', $dt->id)}}" id="delete" class="btn btn-sm btn-flat btn-danger btn-hapus"><i class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>kode</th>
                                <th>ID Member</th>
                                <th>Email</th>
                                <th>No Hp</th>
                                <th>Status Paket</th>
                                <th>Alamat</th>
                                <th>Pesan Tanggal</th>
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
        $(document).ready(function () {
            var table = $('#example1').DataTable();

            //START EDIT

            table.on('click','.edit', function () {
                $tr = $(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#nama').val(data[1]);
                $('#kode').val(data[2]);
                $('#id_member').val(data[3]);
                $('#email').val(data[4]);
                $('#no_hp').val(data[5]);
                $('#alamat').val(data[6]);

                $('#editform').attr('action', '/costumer/'+data[0]);
                $('#editmodal').modal('show');

            });
        });
    </script>
@endsection





