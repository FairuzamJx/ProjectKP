@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Master Edit Barang')

<form action="/master/save_ebarang/<?= $edit_barang->id; ?>" method="POST" enctype="multipart/form-data">
    @csrf
    @if (session('sukses'))
    <div class="alert alert-success mt-2" role="alert">
        {{session('sukses') }}.
        @endif
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="my-3">Edit Barang</h2>
                    <hr>

                    <div class="form-group row">
                        <label for="kode_barang" class=" col-2  col-form-label">Kode Barang</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?= $edit_barang->id_produk; ?>" class="form-control" id="id_produk" name="id_produk" autofocus value="" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_barang" class="col-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-4">
                            <input type="text" value="<?= $edit_barang->nama_barang; ?>" class="form-control" id="nama_barang" name="nama_barang" autofocus value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_jenis" class="col-2 col-form-label">Jenis barang</label>
                        <div class="col-sm-4">
                            <select type="id_jenis" class="form-control  @error('id_jenis') is-invalid @enderror" id="id_jenis" name="id_jenis">
                                <option value="<?= $edit_barang->id_jenis; ?>"><?= $edit_barang->jenisb; ?></option>
                                @foreach ($barang as $br )
                                <option value="<?= $br->id; ?>"><?= $br->jenisb; ?></option>
                                @endforeach
                                @error('id_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_suplier" class="col-2 col-form-label">Nama Suplier</label>
                    <div class="col-sm-4">
                        <select type="id_suplier" class="form-control  @error('id_suplier') is-invalid @enderror" id="id_suplier" name="id_suplier">
                            <option value="<?= $edit_barang->id_suplier; ?>"><?= $edit_barang->nama_suplier; ?></option>
                            @foreach ($barang as $br )
                            <option value="<?= $br->id; ?>"><?= $br->nama_suplier; ?></option>
                            @endforeach
                            @error('id_suplier')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="stok" class=" col-2 col-form-label">Stok</label>
                <div class="col-sm-4">
                    <input type="number" value="<?= $edit_barang->stok; ?>" class="form-control" id="namapimpinan" name="stok" readonly>

                </div>

            </div>

            <button type="submit" class="btn btn-primary mt-2">Edit</button>
        </div>
    </div>
    </div>
</form>
@endsection
