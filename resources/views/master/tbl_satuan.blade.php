@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Satuan')
@section('title', 'Data Master Suplier')
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
        <a href="/master/t_satuan" class="btn btn-primary" data-toggle="modal" data-target="#edit">Tambah Suplier</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead class="text-center">
                <tr>


                    <th>Nama Suplier</th>
                    <th>Alamat</th>
                    <th>No HandPhone</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach($tbl_satuan as $s)
                <tr>

                    <td><?= $s->nama_suplier; ?>
                    </td>
                    <td><?= $s->alamat_sup; ?>
                    </td>
                    <td><?= $s->nohp_sup; ?>
                    </td>
                    <td><?= $s->des_sup; ?>
                    </td>

                    <td width='150px' class="text-center">
                        <form action="/master/d_satuan/<?= $s->id_suplier; ?>" enctype="multipart/form-data" class="d-inline">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger d-inline " onclick="return confirm('apakah anda yakin?');"><i class="fas fa-fw fa-trash"></i> </button>
                        </form>
                        <a href="" class="btn btn-success" data-toggle="modal" data-target="#edit<?= $s->id_suplier;?>"><i class="fas fa-fw fa-pen"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <div class="modal fade" id="edit">
            <div class="modal-dialog modal-sm-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Suplier</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/master/t_satuan" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Nama Suplier</label>
                            <input type="name" class="form-control" id="nama_suplier" name="nama_suplier" autofocus value="<?= old('nama_suplier'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>Alamat</label>
                            <input type="name" class="form-control" id="alamat_sup" name="alamat_sup" autofocus value="<?= old('alamat_sup'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>No HandPhone</label>
                            <input type="number" class="form-control" id="nohp_sup" name="nohp_sup" autofocus value="<?= old('nohp_sup'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>Deskripsi</label>
                            <input type="name" class="form-control" id="des_sup" name="des_sup" autofocus value="<?= old('des_sup'); ?>" required>

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
        @foreach($tbl_satuan as $s)
        <div class="modal fade" id="edit<?= $s->id_suplier;?>">
            <div class="modal-dialog modal-sm-10">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Suplier</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/master/e_satuan/<?= $s->id_suplier; ?>" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <label>Nama Suplier</label>
                            <input type="name" class="form-control" value="<?= $s->nama_suplier; ?>" id="nama_suplier" name="nama_suplier" autofocus value="<?= old('nama_suplier'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>Alamat</label>
                            <input type="name" class="form-control" value="<?= $s->alamat_sup; ?>" id="alamat_sup" name="alamat_sup" autofocus value="<?= old('alamat_sup'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>No HandPhone</label>
                            <input type="number" class="form-control" value="<?= $s->nohp_sup; ?>" id="nohp_sup" name="nohp_sup" autofocus value="<?= old('nohp_sup'); ?>" required>

                        </div>
                        <div class="modal-body">
                            <label>Deskripsi</label>
                            <input type="name" class="form-control" value="<?= $s->des_sup; ?>" id="des_sup" name="des_sup" autofocus value="<?= old('des_sup'); ?>" required>

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
