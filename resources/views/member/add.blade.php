@extends('layouts.master')

@section('content')

@if (\Auth::user()->role_id == 1)
     <!-- Main content -->
     <section class="content">
        <div class="container-fluid">
            
            <!-- SELECT2 EXAMPLE -->
            <div class="row">
                <div class="col-md-1">

                </div>
                <div class="col-md-10">
                    <p>
                        <br>
                        <button class="btn btn-warning btn-refresh"><i class="fa fa-spinner"></i></button>
                        <a href="{{url('member')}}" class="btn btn-danger"><i class="fa fa-arrow-alt-circle-left"></i></a>
                    </p>
                    <div class="card card-primary" style="margin-top: 30px">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title }}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                            </div>
                        </div>
                        
                                <div class="card-body">
                                    <form method="POST" action="{{ url('member/add') }}">
                                        @csrf
                                        <div class="input-group mb-3">
                                           <input type="hidden" class="form-controll" value="MEM-{{ date('mdHis')}}" name="id_member" id="id_member">
                                        </div>

                                        <div class="input-group mb-3">
                                            <select class="form-control select2" name="role_id" style="width: 400px;">
                                                <option selected="selected">Pilih Level User</option>
                                                @foreach($level as $lv)
                                                    <option value="{{$lv->id}}">{{$lv->nama}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user fa-sm"></span>
                                                </div>
                                            </div>
                                         </div> 

                                        <div class="input-group mb-3">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                                   name="name" value="{{ old('name') }}" required autocomplete="off" autofocus placeholder="Masukan Nama">
                
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="input-group mb-3">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                   name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="Masukan E-mail">
                
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Masukan Password">
                
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" placeholder="Konfirmasi Password">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-controll" name="photo">
                                         </div>
                                                <button type="submit" class="btn btn-danger btn-block">Tambah</button>
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

