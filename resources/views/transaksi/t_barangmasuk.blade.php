@extends('layout.navbar')
@section('content')
@section('judul', 'Form Barang Masuk')


<form action="/transaksi/save_bmasuk" method="POST" enctype="multipart/form-data">
    @csrf
    @if (session('sukses'))
    <div class="alert alert-success mt-2" role="alert">
        {{session('sukses') }}.
        @endif

        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="my-3">Form Barang Masuk</h2>
                    <hr>
                  
                    <div class="form-group row">
                        <label for="tanggal" class="col-2 col-form-label">Tanggal</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control  @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" autofocus value="">
                            @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id_barang" class="col-2 col-form-label">Nama barang</label>
                        <div class="col-sm-4">
                            <select type="id_pro" class="form-control  @error('id_pro') is-invalid @enderror" id="id_pro" name="id_pro">
                                <option value="">--Pilih Produk--</option>
                                @foreach ($produk as $m )
                                <option value=" <?= $m->id_produk; ?>"> <?= $m->produk_des; ?></option>
                                @endforeach
                                @error('id_pro')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        </select>
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="" class="col-2 col-form-label">Nama Suplier</label>
                        <div class="col-sm-4">
                            <select type="" class="form-control  @error('id_sup') is-invalid @enderror" id="id_sup" name="id_sup">
                                <option value="">--Pilih Suplier--</option>
                                @foreach ($sup as $m )
                                <option value=" <?= $m->id_suplier; ?>"> <?= $m->nama_suplier; ?></option>
                                @endforeach
                                @error('id_sup')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                        </div>
                        </select>
                    </div>
            </div>
                <div class="form-group row">
                    <label for="barang_in" class=" col-2 col-form-label">Barang Masuk</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control @error('barang_in') is-invalid @enderror" id="barang_in" name="barang_in">
                        @error('barang_in')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer justify-content-between col-sm-8">
                    <a href="/transaksi/b_masuk" class="btn btn-danger mt-2" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-success mt-2">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection
