<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $BarangModel;
    protected $TransaksiModel;
    protected $user;
    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->TransaksiModel = new TransaksiModel();
        $this->user = new user();
    }

    public function index()
    {
        $data = [
            'jml_barang' => $this->BarangModel->jml_barang(),
            'jml_masuk' => $this->TransaksiModel->jml_masuk(),
            'jml_keluar' => $this->TransaksiModel->jml_keluar(),
            'jml_user' => $this->user->jml_user()
        ];
        return view('dashboard', $data);
    }
}
