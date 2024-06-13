<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiModel;
use App\Models\BarangModel;

class NotificationController extends Controller
{
    public function markAsRead($id)
    {
        DB::table('notifications')->where('id', $id)->update(['is_read' => 1]);

        return redirect()->back()->with('sukses', 'Notifikasi telah ditandai sebagai dibaca.');
    }

    // Hapus semua notifikasi
    public function deleteAll()
    {
        DB::table('notifications')->truncate(); // Menghapus semua data dari tabel notifikasi

        return redirect()->back()->with('sukses', 'Semua notifikasi telah dihapus.');
    }
    

}