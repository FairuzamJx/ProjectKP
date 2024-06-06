<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangModel extends Model
{
    use HasFactory;

    public function getData()
    {
        return DB::table('tbl_barang')->leftJoin('tbl_jenisb', 'tbl_jenisb.id_jenisb', '=', 'tbl_barang.id_jenis')
            ->leftJoin('tbl_satuan', 'tbl_satuan.id_satuan', '=', 'tbl_barang.id_satuan')
            ->get();
    }

    public function edit_barang($id)
    {
        return DB::table('tbl_barang')->leftJoin('tbl_jenisb', 'tbl_jenisb.id_jenisb', '=', 'tbl_barang.id_jenis', 'ASC')
            ->leftJoin('tbl_satuan', 'tbl_satuan.id_satuan', '=', 'tbl_barang.id_satuan', 'ASC')
            ->where('id', $id)->get()->first();
    }

    public function update_barang($data)
    {
        DB::table('tbl_barang')->where('id', $data['id'])->update($data);
    }


    public function jml_barang()
    {
        return DB::table('tbl_barang')->count();
    }
}
