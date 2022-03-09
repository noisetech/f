<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RuanganControllerUser extends Controller
{
    public function list_ruangan_berdasarkan_metode_content_based()
    {

        $data = User::whereHas('kegiatan', function ($q) {
            return $q->where('user_kegiatan.user_id', Auth::user()->id);
        })->first();

        if (empty($data)) {
            return redirect()->route('memilih.kegiatan.user');
        } else {
            $user_login = Auth::user()->id;
            $kegiatan = Kegiatan::whereHas('user', function ($q)
            use ($user_login) {
                return $q->where('user_kegiatan.user_id', $user_login);
            })->pluck('id');


            $data = Ruangan::whereHas('kegiatan', function ($q)
            use ($kegiatan) {
                return $q->whereIn('kegiatan_id', $kegiatan);
            })->get()->sortByDesc('waktu_awal')
                ->sortByDesc('waktu_akhir')
                ->sortByDesc('hari');

            return view('pages.user.ruangan', [
                'data' => $data
            ]);
        }
    }
}