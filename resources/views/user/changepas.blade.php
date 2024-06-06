@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Form Change Password')

<form action="/user/changePassword" method="POST" enctype="multipart/form-data">
    @csrf
    @if (session('sukses'))
    <div class="alert alert-success mt-2" role="alert">
        {{session('sukses') }}.
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="my-3">Form Change Password</h2>
                    <hr>
                    <div class="form-group row">
                        <label for="password" class=" col-2  col-form-label">Current Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" autofocus value="<?= old('password'); ?>">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new-password" class=" col-2  col-form-label">New Password</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control  @error('new-password') is-invalid @enderror" id="new-password" name="new-password" autofocus value="<?= old('new-password'); ?>">
                            @error('new-password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between col-sm-8">
                        <a href="/" class="btn btn-danger mt-2" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-success mt-2">Tambah</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
</form>
@endsection
