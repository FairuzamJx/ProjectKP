@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Form Edit Barang Masuk')



<form action="/transaksi/save_editbarangmasuk/<?= $edit_masuk->id_masuk; ?>" method="post" enctype="multipart/form-data">
    @csrf
    @if (session('sukses'))
    <div class="alert alert-success mt-2" role="alert">
        {{session('sukses') }}.
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="my-3">Form Edit Barang Masuk</h2>
                    <hr>

                    <div class="form-group row">
                        <label for="id_transaksi" class="col-2 col-form-label">Kode Transaksi</label>
                        <div class="col-sm-4">
                            <input type="" class="form-control" id="id_transaksi" name="id_transaksi" autofocus value="<?= $edit_masuk->id_transaksi; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control  @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="<?= $edit_masuk->tanggal; ?>">
                            @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_barang" class="col-2 col-form-label">Nama barang</label>
                        <div class="col-sm-4">
                            <select type="name" class="form-control  @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang">
                                <option value="<?= $edit_masuk->id_masuk; ?>"><?= $edit_masuk->nama_barang; ?></option>
                                @foreach ($barang as $m )
                                <option value=" <?= $m->id; ?>"> <?= $m->nama_barang; ?></option>
                                @endforeach
                                @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="barang_in" class=" col-2 col-form-label">Barang Masuk</label>
                    <div class="col-sm-4">
                        <input type="number" value="<?= $edit_masuk->barang_in; ?>" class="form-control @error('barang_in') is-invalid @enderror" id="barang_in" name="barang_in">
                        @error('barang_in')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between col-sm-8">
                    <a href="" class="btn btn-danger mt-2" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-success mt-2">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
