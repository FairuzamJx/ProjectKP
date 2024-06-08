<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransaksiModel;
use App\Models\BarangModel;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        DB::table('notifications')->where('is_read', 0)->update(['is_read' => 1]);

        return redirect()->back()->with('sukses', 'Notifikasi telah ditandai sebagai dilihat.');
    }
    

}