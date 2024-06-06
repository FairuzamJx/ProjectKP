@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Table Manajemen User')
@section('title', 'Manajemen User')
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
        <a href="/user/v_register" class="btn btn-primary">Tambah User</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>email</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                @php
                $n=1;
                @endphp
                @foreach ($user as $us )
                <tr>

                    <td class="text-center"><?= $n++; ?></td>
                    <td><?= $us->name; ?></td>
                    <td><?= $us->email; ?></td>


                    <td width='150px' class="text-center">
                        <form action="/user/delete/<?= $us->id; ?>" method="get" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger d-inline " onclick="return confirm('apakah anda yakin?');"><i class="fas fa-fw fa-trash"></i> </button>
                        </form>
                        <a href="/user/edit_user/<?= $us->id; ?>" class="btn btn-success"><i class="fas fa-fw fa-pen"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        @endsection()
