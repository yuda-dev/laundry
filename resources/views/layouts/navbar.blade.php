<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm"></p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i></p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                
                <div class="dropdown-divider"></div>
               
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->

        <?php
                $costumer = \DB::select("SELECT * from tb_costumer ORDER BY created_at DESC LIMIT 3");
        ?>

        <li class="nav-item dropdown">
                @if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 2 )
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">{{ count($costumer) }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                    
                    </span>
                <center><p>Notifikasi Pesanan</p></center>
                @foreach($costumer as $cs)
                <div class="dropdown-divider"></div><br>
                <a href="#" class="dropdown-item">
                    <i class="fa fa-shopping-cart mr-2"></i> {{ $cs->kode }}<br>
                    <span class="float-left text-muted text-sm">on {{\Carbon\Carbon::parse($cs->created_at)->diffForHumans()}}</span>
                </a>
                @endforeach
                <div class="dropdown-divider"></div>
                <a href="{{ url('costumer') }}" class="dropdown-item dropdown-footer btn-b">Lihat Semua</a>
                @else
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">
                    
                    </span>
                <center><p>Notifikasi</p></center>
                <div class="dropdown-divider"></div><br>
                <a href="#" class="dropdown-item">
                    <span class="float-left text-muted text-sm"></span>
                </a>
                @endif
               

            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->