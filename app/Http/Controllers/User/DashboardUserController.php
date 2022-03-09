<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    public function dashboard_user()
    {

        $total_ruangan = Ruangan::count();
        $total_ruangan_yang_bisa_dipinjam = Ruangan::where('status', 'Tersedia')->count();
        $total_ruangan_yang_tidak_bisa_dipinjam = Ruangan::where('status', 'Tidak Tersedia')->count();


        return view('pages.user.dashboard-user', [
            'total_ruangan' => $total_ruangan,
            'total_ruangan_yang_bisa_dipinjam' => $total_ruangan_yang_bisa_dipinjam,
            'total_ruangan_yang_tidak_bisa_dipinjam' => $total_ruangan_yang_tidak_bisa_dipinjam
        ]);
    }
}