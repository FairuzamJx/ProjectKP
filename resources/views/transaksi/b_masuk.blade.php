@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Barang Masuk')
@section('title', 'Table Barang Masuk')
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
    <div class="card-header">
        <a href="/transaksi/t_masuk" class="btn btn-success">Tambah Barang Masuk</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Kode Produk</th>
                    <th>Product Description</th>
                    <th>Tanggal</th>
                    <th>Suplier</th>
                    <th>Jumlah Masuk</th>
                    <!-- <th>Aksi</th> -->

                </tr>
            </thead>
            <tbody>
                @php
                $n=1;
                @endphp
                @foreach ($masuk as $ms )
                <tr>
                    <td class="text-center"><?= $n++; ?></td>
                    <td><?= $ms->kode_barang; ?></td>
                    <td><?= $ms->produk_des; ?></td>
                    <td><?= $ms->tanggal; ?></td>
                    <td><?= $ms->nama_suplier; ?></td>
                    <td class="text-center"><?= $ms->barang_in; ?></td>
                    <!-- <td width='150px' class="text-center">
                        <a href="/transaksi/t_masuk" class="btn btn-success"><i class="fas fa-fw fa-plus"></i>
                        </a>
                    </td> -->
                </tr>
            </tbody>
            @endforeach
        </table>
        @endsection()
