@extends('layout.navbar')
@section('content')
@section('judul', 'Jenis Barang')
@section('title', 'Data Master Jenis Barang')
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
<style>
#gambar_produk {
    transition: transform 0.2s;
    max-width: 500px;
}
#gambar_produk:hover {
    transform: scale(2.5); /* Sesuaikan dengan tingkat zoom yang diinginkan */
}
</style>
@role('admin', 'superadmin')
        <div class="card-header">
            <a href="/master/t_satuan" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambah Produk</a>
        </div>
    @endrole
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>

                    <th>Kode Barang</th>
                    <th>Produk Description</th>
                    <!-- <th>QTY Suply</th> -->
                    <th>Unit</th>
                    <th>On Hand STOCK</th>
                    <th>Max</th>
                    <th>Min</th>
                    <!-- <th>Total Persamaan</th> -->
                    <!-- Supplier -->
                    <!-- tanggal masuk -->
                    <th>Bin Loc</th>
                    <th>PO / SPR / PCO</th>
                    <th>Remarks</th>
                    <th>Gambar Produk</th>
                    @role('admin', 'superadmin')
                    <th>Aksi</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach($tbl_jenisb as $br)
                <tr>
                    <td><?= $br->kode_barang; ?>
                    </td>
                    <td><?= $br->produk_des; ?>
                    </td>
                    <td><?= $br->unit; ?>
                    </td>
                    <td><?= $br->onh_stok; ?>
                    </td>
                    <td><?= $br->max; ?>
                    </td>
                    <td><?= $br->min; ?>
                    </td>
                    <td><?= $br->bin_loc; ?>
                    </td>
                    <td><?= $br->posprpo; ?>
                    </td>
                    <td><?= $br->remarks; ?>
                    </td>
                    <td>  <img src="{{ asset('images/' . $br->produk_img) }}" alt="Gambar Produk" id="gambar_produk" style="max-width: 100px;" >
                    </td>
                    
                    @role('admin', 'superadmin')
                    <td width='150px' class="text-center">
                        <form action="/master/d_jbarang/<?= $br->id_produk; ?>" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger d-inline " onclick="return confirm('apakah anda yakin?');"><i class="fas fa-fw fa-trash"></i> </button>
                        </form>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $br->id_produk;?>"><i class="fas fa-fw fa-pen"></i>
                        </a>
                    </td>
                    @endrole
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="modal fade" id="tambah">
            <div class="modal-dialog modal-sm-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/master/t_jbarang" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Tag Number</label>
                            <input type="name" class="form-control"  id="kode_barang" name="kode_barang" autofocus value="<?= old('kode_barang'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>Deskripsi</label>
                            <input type="name" class="form-control" id="produk_des" name="produk_des" autofocus value="<?= old('produk_des'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>Unit</label>
                            <input type="name" class="form-control" id="unit" name="unit" autofocus value="<?= old('unit'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>On Hand Stock</label>
                            <input type="number" value="0" class="form-control" id="onh_stok" name="onh_stok" autofocus value="<?= old('onh_stok'); ?>" >
                        </div>
                        <div class="modal-body">
                            <label>Max</label>
                            <input type="number" class="form-control" id="max" name="max" autofocus value="<?= old('max'); ?>"required >
                        </div>
                        <div class="modal-body">
                            <label>Min</label>
                            <input type="number" class="form-control" id="min" name="min" autofocus value="<?= old('min'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>Bin Loc</label>
                            <input type="name" class="form-control" id="bin_loc" name="bin_loc" autofocus value="<?= old('bin_loc'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>PO / SPR / PCO</label>
                            <input type="name" class="form-control" id="posprpo" name="posprpo" autofocus value="<?= old('posprpo'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>Remarks</label>
                            <input type="name" class="form-control" id="remarks" name="remarks" autofocus value="<?= old('remarks'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>Gambar Produk</label>
                            <input type="file" class="form-control" id="produk_img" name="produk_img" autofocus value="<?= old('produk_img'); ?>" required>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-edit -->
        </div>
        @foreach($tbl_jenisb as $br)
        <div class="modal fade" id="edit<?= $br->id_produk;?>">
            <div class="modal-dialog modal-sm-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/master/e_jbarang/<?= $br->id_produk; ?>" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Tag Number</label>
                            <input type="name" class="form-control" value="<?= $br->kode_barang; ?>"  id="kode_barang" name="kode_barang" autofocus value="<?= old('kode_barang'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>Deskripsi</label>
                            <input type="name" class="form-control" value="<?= $br->produk_des; ?>" id="produk_des" name="produk_des" autofocus value="<?= old('produk_des'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>Unit</label>
                            <input type="name" class="form-control" value="<?= $br->unit; ?>" id="unit" name="unit" autofocus value="<?= old('unit'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>On Hand Stock</label>
                            <input type="number" class="form-control" value="<?= $br->onh_stok; ?>" id="onh_stok" name="onh_stok" autofocus value="<?= old('onh_stok'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>Max</label>
                            <input type="number" class="form-control" id="max" name="max" autofocus value="<?= old('max'); ?>"required >
                        </div>
                        <div class="modal-body">
                            <label>Min</label>
                            <input type="number" class="form-control" id="min" name="min" autofocus value="<?= old('min'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>Bin Loc</label>
                            <input type="name" class="form-control" value="<?= $br->bin_loc; ?>" id="bin_loc" name="bin_loc" autofocus value="<?= old('bin_loc'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>PO / SPR / PCO</label>
                            <input type="name" class="form-control" value="<?= $br->posprpo; ?>" id="posprpo" name="posprpo" autofocus value="<?= old('posprpo'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>Remarks</label>
                            <input type="name" class="form-control" value="<?= $br->remarks; ?>" id="remarks" name="remarks" autofocus value="<?= old('remarks'); ?>" required>
                        </div>
                        <div class="modal-body">
                            <label>Gambar Produk</label>
                            <input type="file" class="form-control" value="<?= $br->produk_img; ?>" id="produk_img" name="produk_img" autofocus value="<?= old('produk_img'); ?>" required>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-edit -->
        </div>
        @endforeach
       

        @endSection()
