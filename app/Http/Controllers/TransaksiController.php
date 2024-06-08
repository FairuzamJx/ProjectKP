<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiModel;
use App\Models\BarangModel;

class TransaksiController extends Controller
{
    protected $TransaksiModel;
    protected $BarangModel;
    public function __construct()
    {
        // $this->TransaksiModel = new TransaksiModel();
        // $this->BarangModel = new BarangModel();
    }

    public function b_masuk()
    {
       $masuk = DB::table('barang_masuk')->join('tbl_satuan', 'barang_masuk.id_sup', '=', 'tbl_satuan.id_suplier')
       ->join('tbl_jenisb', 'barang_masuk.id_pro', '=', 'tbl_jenisb.id_produk')
       ->get();
        return view('transaksi/b_masuk', compact('masuk'));
    }

    public function t_masuk()
    {
       $produk = DB::table('tbl_jenisb')->get();
       $sup = DB::table('tbl_satuan')->get();
        return view('transaksi/t_barangmasuk', compact('produk', 'sup'));
    }

    public function save_bmasuk(Request $request)
    {
        Request()->validate([
            'tanggal' => 'required',
            'barang_in' => 'required',
            'id_pro' => 'required'
        ], [
            
            'barang_in.required' => 'Barang Masuk  Wajib Di Isi !',
            'tanggal.required' => 'Tanggal  Wajib diisi !',
            'id_pro.required' => 'Produk Wajib diisi!'
        ]);

        DB::table('barang_masuk')->insert([
            'id_pro' => $request->id_pro,
            'id_sup' => $request->id_sup,
            'barang_in' => $request->barang_in,
            'tanggal'=> $request->tanggal
        ]);

        DB::table('tbl_jenisb')
        ->where('id_produk', $request->id_pro)
        ->increment('onh_stok', $request->barang_in);

         // Cek stok barang
         DB::table('tbl_jenisb')->where('id_produk', $request->id_pro)->increment('onh_stok', $request->barang_in);

         $stok = DB::table('tbl_jenisb')->where('id_produk', $request->id_pro)->value('onh_stok');
         $produk = DB::table('tbl_jenisb')->where('id_produk', $request->id_pro)->first();
        
         if ($stok >= 5) {
            DB::table('notifications')->insert([
                'message' => 'Stok barang ' . $produk->produk_des . ' Penuh!!!',
                'is_read' => 0
            ]);
        }

        return redirect('transaksi/b_masuk')->with('sukses', 'Data Barang Berhasil Ditambahkan!');
    }

    public function b_keluar()
    {
        $keluar = DB::table('barang_keluar') ->join('tbl_jenisb', 'barang_keluar.id_bmasuk', '=', 'tbl_jenisb.id_produk')
        ->get();
        return view('transaksi/b_keluar', compact('keluar'));
    }

    public function tb_keluar()
    {
        $produkkeluar = DB::table('tbl_jenisb')->get();

        return view('transaksi/t_barangkeluar', compact('produkkeluar'));
    }

    public function save_tbkeluar(Request $request)
    {
    
        $request->validate([
            'tanggal' => 'required',
            'barang_out' => 'required',
            'id_bmasuk' => 'required'
        ], [
            'barang_out.required' => 'Barang Keluar Wajib Di Isi!',
            'tanggal.required' => 'Tanggal Wajib diisi!',
            'id_bmasuk.required' => 'Produk Wajib diisi!'
        ]);

        DB::table('barang_keluar')->insert([
            'id_bmasuk' => $request->id_bmasuk,
            'barang_out' => $request->barang_out,
            'tanggal'=> $request->tanggal
        ]);

        DB::table('tbl_jenisb')
        ->where('id_produk', $request->id_bmasuk)
        ->decrement('onh_stok', $request->barang_out);

        DB::table('tbl_jenisb')->where('id_produk', $request->id_bmasuk)->decrement('onh_stok', $request->barang_out);

        $stok = DB::table('tbl_jenisb')->where('id_produk', $request->id_bmasuk)->value('onh_stok');
        $produk = DB::table('tbl_jenisb')->where('id_produk', $request->id_bmasuk)->first();
    
        if ($stok <= 2) {
            DB::table('notifications')->insert([
                'message' => 'Stok barang ' . $produk->produk_des . ' tersisa ' . $stok,
                'is_read' => 0
            ]);
        }
    

        return redirect('transaksi/b_keluar')->with('sukses', 'Data Barang Berhasil ditambahkan');
    }
    
}
