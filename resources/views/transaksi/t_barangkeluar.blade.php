@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Form Barang Keluar')


<form action="/transaksi/save_tbkeluar" method="POST" enctype="multipart/form-data">
    @csrf
    @if (session('sukses'))
    <div class="alert alert-success mt-2" role="alert">
        {{session('sukses') }}.
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="my-3">Form Barang Keluar</h2>
                    <hr>
                    <div class="form-group row">
                        <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" autofocus value="">
                            @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label">Nama barang</label>
                        <div class="col-sm-4">
                            <select type="" class="form-control  @error('id_bmasuk') is-invalid @enderror" id="id_bmasuk" name="id_bmasuk">
                                <option value="">--Pilih Produk--</option>
                                @foreach ($produkkeluar as $m )
                                <option value=" <?= $m->id_produk; ?>"> <?= $m->produk_des; ?></option>
                                @endforeach
                                @error('id_bmasuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        </select>
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="barang_out" class=" col-2 col-form-label">Barang Keluar</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control @error('barang_out') is-invalid @enderror" id="barang_out" name="barang_out">
                        @error('barang_out')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer justify-content-between col-sm-8">
                    <a href="/transaksi/b_keluar" class="btn btn-danger mt-2" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-success mt-2">Tambah</button>
                </div>

            </div>

        </div>

    </div>
    </div>
</form>
@endsection
