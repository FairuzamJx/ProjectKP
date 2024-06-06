@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Tambah Barang')

<?php $iduser = '001';
$str_time = date('ymdHis');
$nobuk = "BG" . "$iduser" . "$str_time"; ?>

<form action="/master/save_tbarang" method="POST" enctype="multipart/form-data">
    @csrf
    @if (session('sukses'))
    <div class="alert alert-success mt-2" role="alert">
        {{session('sukses') }}.
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="my-3">Tambah Barang</h2>
                    <hr>

                    <div class="form-group row">
                        <label for="kode_barang" class="col-2 col-form-label">Kode Barang</label>
                        <div class="col-sm-4">
                            <input type="" class="form-control" id="kode_barang" name="kode_barang" autofocus value="<?= $nobuk; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class=" col-2  col-form-label">Nama Barang</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control  @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" autofocus value="<?= old('nama_barang'); ?>">
                            @error('nama_barang')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_jenis" class="col-2 col-form-label">Jenis barang</label>
                        <div class="col-sm-4">
                            <select type="id_jenis" class="form-control  @error('id_jenis') is-invalid @enderror" id="id_jenis" name="id_jenis">
                                <option value="">--Pilih Jenis Barang--</option>
                                @foreach ($tbl_jenisb as $jn )
                                <option value="<?= $jn->id_jenisb; ?>"><?= $jn->jenisb; ?></option>
                                @endforeach
                                @error('id_jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_satuan" class="col-2 col-form-label">Nama Satuan</label>
                    <div class="col-sm-4">
                        <select type="id_satuan" class="form-control  @error('id_satuan') is-invalid @enderror" id="id_satuan" name="id_satuan">
                            <option value="">--Pilih Satuan--</option>
                            @foreach ($tbl_satuan as $ts )
                            <option value="<?= $ts->id_satuan; ?>"><?= $ts->nama_satuan; ?></option>
                            @endforeach
                            @error('id_satuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class=" col-2 col-form-label">Stok</label>
                <div class="col-sm-4">
                    <input type="number" class="form-control" value="0" id="namapimpinan" name="stok" readonly>

                </div>

            </div>
            <div class="modal-footer justify-content-between col-sm-8">
                <a href="/master/index" class="btn btn-danger mt-2" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-success mt-2">Tambah</button>
            </div>
        </div>
    </div>
    </div>
</form>


@endsection
