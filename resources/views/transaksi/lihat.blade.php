@if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
     <!-- icheck bootstrap -->
     <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
     <!-- Google Font: Source Sans Pro -->
     <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
     <title>Print Invoice</title>
</head>
<body>
    <section class="content">
        ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
        <div class="card-body">
           <!-- Main content -->
           <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> YUDA LAUNDRY
                  <small class="float-right">Date: {{ $tgl }}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                {{ \Auth::user()->role->nama }}
                <address>
                  <strong>{{ \Auth::user()->name }}</strong><br>
                  Kp. Cianca Rt.02/08<br>
                  Ds. Cisoamang Barat Kec. Cikalong Kab. Bandung barat<br>
                  Phone: 089615768153<br>
                  Email: laracode125@gmail.com
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                Costumer
                <address>
                  <strong>{{ $dt->costumer->nama }}</strong><br>
                  {{ $dt->costumer->alamat }}<br>
                  Phone: {{ $dt->costumer->no_hp }}<br>
                  Email: {{ $dt->costumer->email }}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                No. Transaksi : <b>#{{ $dt->costumer->kode }}</b><br>
                ID Member : <b>#{{ $dt->costumer->id_member }}</b><br>
                Tg. Transaksi : <b>{{ date('d F Y H:i:s', strtotime($dt->costumer->created_at)) }}</b><br>
                Tg. Selesai   : <b>{{ date('d F Y H:i:s', strtotime($dt->updated_at)) }}</b>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                    <th>Nama Paket</th>
                    <th>Jenis Laundry</th>
                    <th>Status Paket</th>
                    <th>Status Pesanan</th>
                    <th>Status Pembayaran</th>
                    <th>Berat /kg</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>{{ $dt->paket->nama }}</td>
                    <td>{{ $dt->jlaundry->nama }}</td>
                    <td>{{ $dt->status_paket->nama }}</td>
                    <td>{{ $dt->status_pesanan->status }}</td>
                    <td>{{ $dt->status_pembayaran->status}}</td>
                    <td>{{ $dt->berat}} kg</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-8">
                <p class="lead"><b>Keterangan:</b></p>
                <p>Dihitung Berdasarkan :</p>
                <p>(Jenis laundry x berat) + Nama Paket + Status Paket</p>
                
              </div>
              <!-- /.col -->
              <div class="col-4">
                <div class="table-responsive">
                  <table class="table">
                    <th>Diskon :</th>
                    <td><strong>- Rp. {{number_format($dt->diskon->harga, 0)}}</strong></td>
                  </tr>
                </table>
                  <table class="table">
                      <th>G.Total :</th>
                      <td><strong>Rp. {{number_format($dt->total, 0)}}</strong></td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row no-print">
              <div class="col-12">
                <button onclick="window.print()" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-print"></i> Print
                </button>
              </div>
            </div>

            <!-- this row will not appear when printing -->
          </div>
          <!-- /.invoice -->
        </div>
        </div>
        ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
      
    </section>
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>

</body>
</html>
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
    

