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


        // Ambil data produk
    // Get the product data
    $produk = DB::table('tbl_jenisb')->where('id_produk', $request->id_pro)->first();

    if ($produk) {
        // Get the current stock
        $stok_sebelumnya = $produk->onh_stok;

        // Calculate the new stock
        $stok_baru = $stok_sebelumnya + $request->barang_in;

        // Check if the new stock exceeds the maximum limit
        if ($stok_baru > $produk->max) {
            // If the stock exceeds the maximum, redirect with an error message
            return redirect('transaksi/t_masuk')->withErrors(['barang_in' => 'Stok barang ' . $produk->produk_des . ' melebihi batas maksimum!']);
        }

        // Insert the new incoming goods
        DB::table('barang_masuk')->insert([
            'id_pro' => $request->id_pro,
            'id_sup' => $request->id_sup,
            'barang_in' => $request->barang_in,
            'tanggal' => $request->tanggal
        ]);

        // Update the stock
        DB::table('tbl_jenisb')->where('id_produk', $request->id_pro)->update(['onh_stok' => $stok_baru]);

        // Add a notification if the stock reaches or exceeds the maximum limit
        if ($stok_baru > $produk->max) {
            DB::table('notifications')->insert([
                'message' => 'Stok barang ' . $produk->produk_des . ' mencapai atau melebihi batas maksimum!',
                'is_read' => 0
            ]);
        }

        // Redirect with a success message
        return redirect('transaksi/b_masuk')->with('sukses', 'Data Barang Berhasil Ditambahkan!');
    } else {
        // If the product is not found, redirect with an error message
        return redirect('transaksi/b_masuk')->withErrors(['id_pro' => 'Produk tidak ditemukan.']);
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


        // Ambil data produk
    $produk = DB::table('tbl_jenisb')->where('id_produk', $request->id_bmasuk)->first();

    if ($produk) {
        // Ambil stok produk sebelum dikurangkan
        $stok_sebelumnya = $produk->onh_stok;

        // Kurangkan nilai barang_out dari stok produk
        $stok_baru = $stok_sebelumnya - $request->barang_out;

        // Pastikan stok tidak kurang dari nol
        $stok_baru = max(0, $stok_baru);

        // Update stok produk
        DB::table('tbl_jenisb')->where('id_produk', $request->id_bmasuk)->update(['onh_stok' => $stok_baru]);

        // Cek apakah stok kurang dari batas minimum (min)
        if ($stok_baru < $produk->min) {
            // Jika stok kurang dari batas minimum, tambahkan notifikasi
            DB::table('notifications')->insert([
                'message' => 'Stok barang ' . $produk->produk_des . ' kurang dari batas minimum!!!',
                'is_read' => 0
            ]);
        }
    } else {
        // Jika data produk tidak ditemukan, kembalikan pesan kesalahan
        return redirect('transaksi/b_keluar')->withError('Produk tidak ditemukan.');
    }

    return redirect('transaksi/b_keluar')->with('sukses', 'Data Barang Berhasil ditambahkan');
}
    
}
