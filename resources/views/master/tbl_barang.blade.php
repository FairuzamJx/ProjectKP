@extends('layout.navbar')
@section('content')
@section('judul', 'Master Barang')
@section('title', 'Data Master Barang')
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
        <a href="/master/tambah_barang" class="btn btn-primary">Tambah Produk</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis</th>
                    <th>Satuan</th>
                    <th>Stok</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                @php
                $n=1;
                @endphp
                @foreach ($barang as $br )
                <?php

                ?>
                <tr>

                    <td class="text-center"><?= $n++; ?></td>
                    <td><?= $br->kode_barang; ?></td>
                    <td><?= $br->nama_barang; ?></td>
                    <td><?= $br->jenisb; ?></td>
                    <td><?= $br->nama_satuan; ?></td>
                    <td><?= $br->stok; ?></td>


                    <td width='150px' class="text-center">
                        <form action="/master/d_barang/<?= $br->id; ?>/" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger d-inline " onclick="return confirm('apakah anda yakin?');"><i class="fas fa-fw fa-trash"></i> </button>
                        </form>
                        <a href="/master/e_barang/<?= $br->id; ?>" class="btn btn-success"><i class="fas fa-fw fa-pen"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach()
        </table>
        @endsection()
