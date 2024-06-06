<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    protected $TransaksiModel;
    public function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
    }

    public function v_laporan()
    {

        $data = [
            'laporan' => $this->TransaksiModel->getData()
        ];

        return view('laporan/laporan_barang', $data);
    }

    public function print(Request $request)
    {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();

        $cetakbarang = DB::table('barang_masuk')->leftJoin('tbl_barang', 'tbl_barang.id', '=', 'barang_masuk.id_barang')
            ->leftJoin('tbl_jenisb', 'tbl_jenisb.id_jenisb', '=', 'tbl_barang.id_jenis')
            ->leftJoin('tbl_satuan', 'tbl_satuan.id_satuan', '=', 'tbl_barang.id_satuan')
            ->where('tanggal', '>=', $start_date)->where('tanggal', '<=', $end_date)->get();


        return view('laporan/print_barangmasuk', compact('cetakbarang'));
    }

    //barang keluar

    public function v_laporankeluar()
    {
        $data = [
            'laporan' => $this->TransaksiModel->getdakel()
        ];
        return view('laporan/laporan_keluar', $data);
    }

    public function print_bkeluar(Request  $request)
    {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();

        $cetakkeluar = DB::table('barang_keluar')->leftJoin('tbl_barang', 'tbl_barang.id', '=', 'barang_keluar.id_barang')
            ->leftJoin('tbl_jenisb', 'tbl_jenisb.id_jenisb', '=', 'tbl_barang.id_jenis')
            ->leftJoin('tbl_satuan', 'tbl_satuan.id_satuan', '=', 'tbl_barang.id_satuan')
            ->where('tanggal', '>=', $start_date)->where('tanggal', '<=', $end_date)->get();

        return view('laporan/print_barangkeluar', compact('cetakkeluar'));
    }
}
