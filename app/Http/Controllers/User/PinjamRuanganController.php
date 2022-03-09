<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PinjamRuanganController extends Controller
{

    public function data_peminjaman()
    {
        $user_login = Auth::user()->id;

        $peminjaman = Peminjaman::whereHas('user', function ($q) use ($user_login) {
            return $q->where('user_id', $user_login);
        })->with(['ruangan'])->get();

        return view('pages.user.data-peminjaman-ruangan', [
            'peminjaman' => $peminjaman
        ]);
    }


    public function proses_pinjam_ruangan($id)
    {
        $user_login = Auth::user()->id;
        $ruangan = Ruangan::find($id);
        $id_ruangan = $ruangan->id;
        $hari_ini = date('Y-m-d');

        // dd($hari_ini);
        // cek data apakah kosong
        $peminjaman =   Peminjaman::whereHas('ruangan', function ($q) use ($id_ruangan) {
            return $q->where('ruangan_id', $id_ruangan);
        })
            ->whereDate('created_at', $hari_ini)
            ->where('status_peminjaman', 'Pending')
            ->first();

        // dd($peminjaman);

        // mengecek peminjaman hari ini apakah belum ada
        // jika belum tambahkan
        if (empty($peminjaman)) {
            Peminjaman::create([
                'user_id' => $user_login,
                'ruangan_id' => $id_ruangan,
                'status_peminjaman' => 'Pending'
            ]);

            Ruangan::where('id', $id_ruangan)
                ->update([
                    'status' => 'Tidak tersedia'
                ]);
            return redirect()->route('data_peminjaman_ruangan');
        } else {
            return redirect()->back()
                ->with('error', 'Ruangan sudah di pinjam' . ', ' . 'pilih ruangan yang lain');
        }
    }


    public function halaman_upload_surat_peminjman_ruangan($id)
    {
        $peminjaman = Peminjaman::find($id);

        return view('pages.user.upload-surat-peminjaman', [
            'peminjaman' => $peminjaman
        ]);
    }

    public function proses_upload_surat_peminjaman(Request $request, $id)
    {
        $this->validate($request, [
            'surat_permohonan_pinjaman' => 'required'
        ]);

        $peminjaman = Peminjaman::find($id);

        $data = $request->all();

        if ($request->hasFile('surat_permohonan_pinjaman')) {
            $data['surat_permohonan_pinjaman'] = $request->file('surat_permohonan_pinjaman')
                ->store('assets/file', 'public');
        }

        $peminjaman->update($data);


        return redirect()->route('data_peminjaman_ruangan');
    }

    public function pengembalian_ruangan(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);

        Peminjaman::where('id', $peminjaman->id)
            ->update([
                'status_peminjaman' => 'Sudah dikembalikan'
            ]);

        $id_ruangan = Peminjaman::where('id', $peminjaman->id)->pluck('ruangan_id');

        Ruangan::whereIn('id', $id_ruangan)
            ->update([
                'status' => 'Tersedia'
            ]);

        return redirect()->route('data_peminjaman_ruangan');
    }

    public function cancel(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);


        Ruangan::where('id', $peminjaman->ruangan_id)
            ->update([
                'status' => 'Tersedia'
            ]);


        Peminjaman::where('id', $peminjaman->id)
            ->update([
                'deleted_at' => Carbon::now()
            ]);

        $id_ruangan = Peminjaman::where('id', $peminjaman->id)->pluck('ruangan_id');


        return redirect()->route('data_peminjaman_ruangan');
    }
}