<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
        <center><span class="brand-text font-weight-light"> <i class="nav-icon fas fa-list"></i> YD-Laundry</span></center>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ url('uploads/'. \Auth::user()->photo)}}" style="height: 40px; width: 40px" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('dashboard')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
             @if(\Auth::user()->role_id == 1)
                    <li class="nav-item has-treeview">
                        <br>
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-mask"></i>
                            <p>
                                Data Master
                                <i class="fas fa-angle-left right"></i>
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/costumer')}}" class="nav-link">
                                    <i class="fa fa-user"></i>
                                    <p>Costumer</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/diskon')}}" class="nav-link">
                                    <i class="fa fa-star"></i>
                                    <p>Diskon</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/paket')}}" class="nav-link">
                                    <i class="fa fa-book"></i>
                                    <p>Nama Paket</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/jlaundry')}}" class="nav-link">
                                    <i class="fa fa-archive"></i>
                                    <p>Jenis Laundry</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/status_paket')}}" class="nav-link">
                                    <i class="far fa-comment"></i>
                                    <p>Status Paket</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/status_pesanan')}}" class="nav-link">
                                    <i class="fa fa-truck"></i>
                                    <p>Status Pesanan</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{url('/status_pembayaran')}}" class="nav-link">
                                    <i class="fa fa-leaf"></i>
                                    <p>Status Pembayaran</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="{{url('/transaksi')}}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-bag"></i>
                            <p>
                                Transaksi
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">SETTING</li>

                    <li class="nav-item has-treeview">
                        <a href="{{url('member')}}" class="nav-link">
                            <i class="nav-icon fas fa fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>
    
                    <li class="nav-item has-treeview">
                        <a href="{{url('keluar')}}" class="nav-link">
                            <i class="nav-icon fas fa fa-power-off"></i>
                            <p>
                                Keluar
                            </p>
                        </a>
                    </li>
             @endif

                @if(\Auth::user()->role_id == 2)

                <li class="nav-item has-treeview">
                    <br>
                    <li class="nav-item has-treeview">
                        <a href="{{url('/costumer')}}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Costumer
                            </p>
                        </a>
                    </li>
                <li class="nav-item has-treeview">
                    <a href="{{url('/transaksi')}}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-header">SETTING</li>

                <li class="nav-item has-treeview">
                    <a href="{{url('profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
    
                    <li class="nav-item has-treeview">
                        <a href="{{url('keluar')}}" class="nav-link">
                            <i class="nav-icon fas fa fa-power-off"></i>
                            <p>
                                Keluar
                            </p>
                        </a>
                    </li>
                @endif

                @if(\Auth::user()->role->id == 3)
                <li class="nav-item has-treeview">
                    <br>
                <li class="nav-item has-treeview">
                    <a href="{{url('profile')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                <li class="nav-header">SETTING</li>
    
                    <li class="nav-item has-treeview">
                        <a href="{{url('keluar')}}" class="nav-link">
                            <i class="nav-icon fas fa fa-power-off"></i>
                            <p>
                                Keluar
                            </p>
                        </a>
                    </li>
                @endif
               
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
