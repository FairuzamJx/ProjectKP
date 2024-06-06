@extends('layout.navbar')
@section('content')
@section('judul', 'Laravel | Dashboard')
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
            @foreach ($cetakkeluar as $lp )
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
<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>
@endsection
