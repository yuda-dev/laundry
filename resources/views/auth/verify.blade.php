
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
     <div class="alert alert-success alert-dismissible">
                  <h5><i class="icon fas fa-check"></i> Vertifikasi Email anda</h5>
                  @if (session('resent'))
         <div class="alert alert-success" role="alert">
            {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
         </div>
     @endif

        {{ __('Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.') }}
        {{ __('Jika Anda tidak menerima email') }}, 
        <a href="{{ route('verification.resend') }}">
            {{ __('klik di sini untuk meminta yang lain') }}
        </a>.
                </div>
    <!-- /.login-logo -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>

</body>
</html>


