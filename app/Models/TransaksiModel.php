<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TransaksiModel extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = ['barang_masuk'];

    public function getData()
    {
        return DB::table('barang_masuk')->leftJoin('tbl_barang', 'tbl_barang.id', '=', 'barang_masuk.id_barang', 'DESC')
            ->leftJoin('tbl_jenisb', 'tbl_jenisb.id_jenisb', '=', 'tbl_barang.id_jenis', 'DESC')
            ->leftJoin('tbl_satuan', 'tbl_satuan.id_satuan', '=', 'tbl_barang.id_satuan')
            ->get();
    }

    public function getdakel()
    {
        return DB::table('barang_keluar')->leftJoin('tbl_barang', 'tbl_barang.id', '=', 'barang_keluar.id_barang', 'DESC')
            ->leftJoin('tbl_jenisb', 'tbl_jenisb.id_jenisb', '=', 'tbl_barang.id_jenis', 'DESC')
            ->leftJoin('tbl_satuan', 'tbl_satuan.id_satuan', '=', 'tbl_barang.id_satuan')
            ->get();
    }

    public function get($id_masuk)
    {
        return DB::table('barang_masuk')->leftJoin('tbl_barang', 'tbl_barang.id', '=', 'barang_masuk.id_barang', 'DESC')
            ->leftJoin('tbl_jenisb', 'tbl_jenisb.id_jenisb', '=', 'tbl_barang.id_jenis', 'DESC')
            ->leftJoin('tbl_satuan', 'tbl_satuan.id_satuan', '=', 'tbl_barang.id_satuan')
            ->where('id_masuk', $id_masuk)->get()->first();
    }

    public function save_edit($data)
    {
        DB::table('barang_masuk')->where('id_masuk', $data['id_masuk'])->update($data);
    }

    public function jml_masuk()
    {
        return DB::table('barang_masuk')->count();
    }

    public function jml_keluar()
    {
        return DB::table('barang_keluar')->count();
    }   
}