<nav class="main-header navbar navbar-expand navbar-white-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-dark " data-widget="pushmenu" href="/" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link text-dark">Home</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">

            <h5>Holla, {{ Auth::user()->name }}</h5>

        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-3">
    <a href="" class="brand-link">
        <img src="{{ asset('img') }}/logom.png" alt="AdminLTE Logo" class="brand-image img-circle  elevation-2"
            style="opacity: .8">
        <span class="brand-text font-weight-light" style="height: 20px; margin-left:-4px; color:aliceblue;">Limarsa
            Gentari Utama</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="/dashboard" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-table"></i>
                        <p>
                            Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/master/type_price" class="nav-link ">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>Katogeri Harga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/master/jenjang" class="nav-link ">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>Katogeri Jenjang</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="/arsip/v_arsip" class="nav-link ">
                        <i class="nav-icon fa-solid fa-box-archive"></i>
                        <p>
                            Arsip
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="/pemohon/data_pemohon" class="nav-link ">
                        <i class="nav-icon fa-solid fa-person"></i>
                        <p>
                            Pemohon
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="/pesan/view_pesan" class="nav-link ">
                        <i class="nav-icon fas fa-fw fa-message"></i>
                        <p>
                            Message
                        </p>
                    </a>

                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-cog"></i>
                        <p>
                            Setting
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/auth/view_user" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>Manajemen User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/skk/harga_skk" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>Harga SKK</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="/creative/pricing" class="nav-link ">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>
                                    Pricing
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
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
                    @yield('judul')
                </div><!-- /.col -->
                <div class="col-sm-6">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            @yield('content')

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Limarsa &copy; 2023 </strong> All rights reserved.
</footer>
</div>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
