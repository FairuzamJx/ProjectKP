@extends('layout.navbar')
@section('content')
@section('judul', 'Barang Keluar')
@section('title', 'Table Barang Keluar')
@if (session('sukses'))
<div class="alert alert-success mt-2" role="alert">
    {{session('sukses') }}.
</div>
@endif
@if (session('danger'))
<div class="alert alert-danger mt-2" role="alert">
    {{session('danger') }}.
</div>
@endif
<div class="card">
@role('superadmin', 'admin')
<div class="card-header">
        <a href="/transaksi/tb_keluar" class="btn btn-primary">Tambah Barang Keluar</a>
    </div>
    @endrole

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Product Description</th>
                    <th>Tanggal</th>
                    <th>Jumlah Keluar</th>
                    <!-- <th>Aksi</th> -->

                </tr>
            </thead>
            <tbody>
                @php
                $n=1;
                @endphp
                @foreach ($keluar as $kl )

                <tr>
                    <td class="text-center"><?= $n++; ?></td>
                    <td><?= $kl->kode_barang; ?></td>
                    <td><?= $kl->produk_des; ?></td>
                    <td><?= $kl->tanggal; ?></td>
                    <td class="text-center"><?= $kl->barang_out; ?></td>
                    <!-- <td width='100px' class="text-center">
                        <a href="/transaksi/tb_keluar" class="btn btn-success"><i class="fas fa-fw fa-plus"></i>
                        </a>
                    </td> -->
                </tr>
            </tbody>

            @endforeach
        </table>
        @endsection()
