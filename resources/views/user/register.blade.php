@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Form Tambah User')

<form action="/user/register" method="get" enctype="multipart/form-data">
    @csrf
    @if (session('sukses'))
    <div class="alert alert-success mt-2" role="alert">
        {{session('sukses') }}.
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="my-3">Form Tambah User</h2>
                    <hr>

                    <div class="form-group row">
                        <label for="name" class=" col-2  col-form-label">Nama Pengguna</label>
                        <div class="col-sm-4">
                            <input type="name" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" autofocus value="<?= old('name'); ?>">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class=" col-2  col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" autofocus value="<?= old('email'); ?>">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class=" col-2  col-form-label">Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" autofocus value="<?= old('password'); ?>">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                    <label for="is_admin" class="col-2 col-form-label">Role</label>
                    <div class="col-sm-4">
                        <select type="is_admin" class="form-control  @error('is_admin') is-invalid @enderror"
                            id="is_admin" name="is_admin">
                            <option value=""disabled selected>--Pilih role--</option>
                            <option value="superadmin">superadmin</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                            @error('is_admin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    </select>
                </div>

                    <div class="modal-footer justify-content-between col-sm-8">
                        <a href="/user/v_user" class="btn btn-danger mt-2" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-success mt-2">Tambah</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
</form>
@endsection
