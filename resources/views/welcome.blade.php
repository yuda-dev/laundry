
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pesan Laundry</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page" style="background-image: url('{{ asset('adminlte/bg.jpg')}}'); background-repeat: no-repeat;background-size: cover">

        <div class="col-md-3">
            @include('modal')

                <button class="btn btn-block btn-danger">
                     Pesan Laundry
                </button>

            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">
                         @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                              <strong>{{ $message }}</strong>
                          </div>
                         @endif
                    </p>

                    <form method="POST" action="{{url('welcome/add')}}">
                        @csrf
                        <div class="input-group mb-3">
                           <input type="hidden" value="TR-{{ $kode }}" name="kode" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="id_member" autocomplete="off" autofocus placeholder="Masukan ID Member (Jika Punya)">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fa fa-puzzle-piece"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                   name="nama" value="{{ old('nama') }}" required autocomplete="off" autofocus placeholder="Masukan Nama">

                            @error('nama')
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
                            <input id="no_hp" type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" required autocomplete="off" placeholder="Masukan No Hp">

                            @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                        </div>

                       <div class="input-group mb-3">
                          <select class="form-control select2" style="width: 100%;" name="status_paket">
                            <option>-- Status Paket --</option>
                            <option value="Jemput">Jemput</option>
                            <option value="Antar">Antar Sendiri</option>
                          </select>
                      </div>

                        <div class="input-group mb-3">
                            <textarea id="alamat" type="text" class="form-control" name="alamat" required autocomplete="off"
                            placeholder="Masukan Alamat" rows="5"></textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-addres"></span>
                                </div>
                            </div>
                        </div>


                        <div class="social-auth-links text-center">

                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-shopping-cart"></i>
                             Pesan Sekarang
                         </button>

                        <a href="{{route('register')}}" class="btn btn-block btn-danger">
                            <i class="fa fa-users"></i>
                             Daftar jadi Member
                        </a>

                        <a href="#" class="btn btn-block btn-success" data-toggle="modal" data-target="#listpaket">
                            <i class="fa fa-list"></i>
                             Lihat Daftar Paket
                        </a>
                    </div>

                    </form>

                    <a href="{{route('login')}}" class="text-center">Saya sudah menjadi keanggotaan?</a>
                </div>
                <!-- /.form-box -->
            </div><!-- /.card -->
        </div>

<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>

</body>
</html>

