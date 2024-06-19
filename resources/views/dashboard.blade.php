@extends('layout.navbar')
@section('content')
@section('judul', 'Dashboard')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $jml_produk; ?></h3>

                        <p>Barang</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-bag"></i>
                    </div>
                    <a href="/master/jbarang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $jml_masuk; ?></h3>

                        <p>Barang Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-cart-plus"></i>
                    </div>
                    <a href="/transaksi/b_masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $jml_keluar; ?></h3>

                        <p>Barang Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-cart-dash"></i>
                    </div>
                    <a href="/transaksi/b_keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $jml_user; ?></h3>

                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <a href="user/v_user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>
@endsection
