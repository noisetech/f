<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ruangan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{



    public function index()
    {

        $total_ruangan = Ruangan::count();
        $total_ruangan_yang_bisa_dipinjam = Ruangan::where('status', 'Tersedia')->count();
        $total_ruangan_yang_tidak_bisa_dipinjam = Ruangan::where('status', 'Tidak Tersedia')->count();

        return view('pages.admin.dashboard-admin', [
            'total_ruangan' => $total_ruangan,
            'total_ruangan_yang_bisa_dipinjam' => $total_ruangan_yang_bisa_dipinjam,
            'total_ruangan_yang_tidak_bisa_dipinjam' => $total_ruangan_yang_tidak_bisa_dipinjam
        ]);
    }
}