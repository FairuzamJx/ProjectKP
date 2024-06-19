@extends('layout.navbar')
@section('content')
@section('judul', 'Laporan Barang Keluar')
<div class="container">
    <div class="card">
        <div class="row col-12">
            <div class="my-4 ml-3">
                <form action="/laporan/print_bkeluar" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-success ml-2" type="submit"> Print</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Satuan</th>
                        <th>Stok</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                    $n=1;
                    @endphp
                    @foreach ($laporan as $lp )
                    <?php
                    ?>
                    <tr>
                        <td class="text-center"><?= $n++; ?></td>
                        <td><?= $lp->kode_barang; ?></td>
                        <td><?= $lp->tanggal; ?></td>
                        <td><?= $lp->nama_barang; ?></td>
                        <td><?= $lp->jenisb; ?></td>
                        <td><?= $lp->nama_satuan; ?></td>
                        <td><?= $lp->barang_out; ?></td>
                    </tr>
                </tbody>
                @endforeach()
            </table>
        </div>
    </div>
</div>
@endsection
