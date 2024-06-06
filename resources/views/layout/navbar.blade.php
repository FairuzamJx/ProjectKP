
<!-- Navbar -->
@include('layout.template')
<nav class="main-header navbar navbar-expand navbar-gradient-dark navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-bell"></i>
            @php
                $notifications = DB::table('notifications')->where('is_read', 0)->get();
                $count = $notifications->count();
            @endphp
            @if($count > 0)
                <span class="badge badge-warning navbar-badge">{{ $count }}</span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">{{ $count }} Notifications</span>
            <div class="dropdown-divider"></div>
            @foreach($notifications as $notification)
                <a href="#" class="dropdown-item">
                    <i class="fas fa-exclamation-circle mr-2"></i> {{ $notification->message }}
                    <span class="float-right text-muted text-sm">{{ $notification->created_at }}</span>
                </a>
                <div class="dropdown-divider"></div>
            @endforeach
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
    </li>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <form action="/user/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                logout</button>
                        </form>


                        <a href="/user/v_changepas" class="dropdown-item"><i class="bi bi-pen-fill"></i> Change Password</a>
                    </div>

                </li>
                @endguest
            </ul>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success sidebar-gradient elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('img')}}/inventory.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-box elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Holla, {{ Auth::user()->name }} </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-bag"></i>
                        <p>
                            Data Master
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/master/jbarang" class="nav-link">
                                <i class=" bi bi-justify nav-icon"></i>
                                <p> Data Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/master/satuan" class="nav-link">
                                <i class="fas fa-truck-moving nav-icon"></i>
                                <p>Data Suplier</p>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon  fas fa-credit-card"></i>
                        <p>
                            Transaksi
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="/transaksi/b_masuk" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Data Barang Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/transaksi/b_keluar" class="nav-link">
                                <i class="fas fa-minus nav-icon"></i>
                                <p>Data Barang Keluar</p>
                            </a>
                        </li>
                </li>


            </ul>
            </li>
            <li class="nav-item has-treeview">
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/laporan/v_laporan" class="nav-link">
                            <i class="bi bi-file-earmark-arrow-down nav-icon"></i>
                            <p>Barang masuk</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/laporan/v_laporankeluar" class="nav-link">
                            <i class="bi bi-file-earmark-arrow-up nav-icon"></i>
                            <p>Barang Keluar</p>
                        </a>
                    </li>
                </ul>


            <li class="nav-item has-treeview">
                <a href="/user/v_user" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Manajemen User
                    </p>
                </a>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <h1> @yield('title')</h1>
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            @yield('content')
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2022<a href=""></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">

    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
