<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BarangModel;


class MasterController extends Controller
{
    protected $BarangModel;
    protected $TransaksiModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
       
    }

    public function index()
    {

        $data = [
            'barang' => $this->BarangModel->getData(),

        ];
        return view('master/tbl_barang', $data);
    }

    public function tambah_barang()
    {
        $jbarang = DB::table('tbl_jenisb')->get();
        $satuan = DB::table('tbl_satuan')->get();
        return view('master/tambah_barang', ['tbl_jenisb' => $jbarang], ['tbl_satuan' => $satuan]);
    }

    public function save_tbarang(Request $request)
    {
        Request()->validate([
            'nama_barang' => 'required',
            'id_produk' => 'required',
            'id_satuan' => 'required',
        ], [
            'nama_barang.required' => 'Nama Barang wajib Di Isi !',
            'id_produk.required' => 'Jenis Barang Wajib Di Isi !',
            'id_satuan.required' => 'Jenis Satuan  Wajib diisi !'
        ]);


        DB::table('tbl_barang')->insert([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'id_produk' => $request->id_produk,
            'id_satuan' => $request->id_satuan,
            'stok' => $request->stok


        ]);

        return redirect('master/index')->with('sukses', 'Data Barang Berhasil ditambahkan');
    }

    public function e_barang($id)
    {
        $data = [
            'edit_barang' => $this->BarangModel->edit_barang($id),
            'barang' => $this->BarangModel->getData()
        ];


        return view('master/ebarang', $data);
    }

    public function save_ebarang($id)
    {
        $data = [
            'id' => $id,
            'nama_barang' => request()->nama_barang,
            'id_jenis' => request()->id_jenis,
            'id_satuan' => request()->id_satuan,
            'kode_barang' => request()->kode_barang,
            'stok' => request()->stok

        ];

        $this->BarangModel->update_barang($data);
        return redirect('master/index',)->with('sukses', 'Data Barang Berhasil Di Edit');
    }

    public function d_barang($id)
    {
        $data = DB::table('tbl_barang')
            ->leftJoin('barang_masuk', 'tbl_barang.id', '=', 'barang_masuk.id_barang')
            ->leftJoin('barang_keluar', 'tbl_barang.id', '=', 'barang_keluar.id_barang')
            ->where('tbl_barang.id', $id);
        DB::table('barang_masuk')->where('id_barang', $id)->delete();
        DB::table('barang_keluar')->where('id_barang', $id)->delete();
        $data->delete();
        return redirect('master/index')->with('danger', ' Data Master Barang Berhasil Di Hapus');
    }


    //jenis barang

    public function jbarang()
    {
        $jbarang = DB::table('tbl_jenisb')->get();
        return view('master/tbl_jbarang', ['tbl_jenisb' => $jbarang]);
    }

    public function t_jbarang(Request $request)
    {
        $request->validate([
            'produk_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $imageName = time() . '.' . $request->produk_img->extension();
    
        $request->produk_img->move(public_path('images'), $imageName);

        DB::table('tbl_jenisb')->insert([
            'kode_barang' => $request->kode_barang,
            'produk_des' => $request->produk_des,
            'produk_img' => $imageName, // Simpan nama gambar ke database
            'onh_stok' => $request->onh_stok,
            'bin_loc' => $request->bin_loc,
            'posprpo' => $request->posprpo,
            'remarks' => $request->remarks,
            'unit' => $request->unit
        ]);
        return redirect('master/jbarang')->with('sukses', 'Data Produk Berhasil Ditambahkan');
    }

    public function e_jbarang(Request $request)
    {
        $request->validate([
            'produk_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $imageName = time() . '.' . $request->produk_img->extension();
    
        $request->produk_img->move(public_path('images'), $imageName);
    
        DB::table('tbl_jenisb')->where('id_produk', $request->id_produk)->update([
            'id_produk'=> $request->id_produk,
            'qty_sup' => $request->qty_sup,
            'kode_barang' => $request->kode_barang,
            'produk_des' => $request->produk_des,
            'produk_img' => $imageName, // Simpan nama gambar ke database
            'onh_stok' => $request->onh_stok,
            'ttl_per' => $request->ttl_per,
            'bin_loc' => $request->bin_loc,
            'posprpo' => $request->posprpo,
            'remarks' => $request->remarks,
            'unit' => $request->unit
        ]);
        return redirect('master/jbarang')->with('sukses', 'Data Barang Berhasil Di Edit');
    }
    public function d_jbarang(Request $request)
    {
        DB::table('tbl_jenisb')->where('id_produk', $request->id_produk)->delete();
        return redirect('master/jbarang')->with('danger', 'Data Produk Berhasil Di Hapus');
    }
    

    //Satuan

    public function satuan()
    {
        $satuan = DB::table('tbl_satuan')->get();
        return view('master/tbl_satuan', ['tbl_satuan' => $satuan]);
    }
    public function t_satuan(Request $request)
    {
        DB::table('tbl_satuan')->insert([
            'nama_suplier' => $request->nama_suplier,
            'alamat_sup' => $request->alamat_sup,
            'nohp_sup' => $request->nohp_sup,
            'des_sup' => $request->des_sup,
        ]);

        return redirect('master/satuan')->with('sukses', 'Data Suplier Berhasil Ditambahkan');
    }

    public function e_satuan(Request $request)
    {
        DB::table('tbl_satuan')->where('id_suplier', $request->id_suplier)->update([
            'id_suplier' => $request-> id_suplier,
            'nama_suplier' => $request->nama_suplier,
            'alamat_sup' => $request->alamat_sup,
            'nohp_sup' => $request->nohp_sup,
            'des_sup' => $request->des_sup,
        ]);
        return redirect('master/satuan')->with('sukses', 'Data Suplier Berhasil Di Edit');
    }

    public function d_satuan($id_suplier)
    {
        DB::table('tbl_satuan')->where('id_suplier', $id_suplier)->delete();
        return redirect('master/satuan')->with('danger', 'Data Suplier Berhasil Dihapus');
    }
}
