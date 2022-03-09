<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class DownloadFileController extends Controller
{
    public function download($id){
        $peminjaman = Peminjaman::find($id);

        $data =  Peminjaman::where('id', $peminjaman->id)->first();

        $file = 'storage/'.$data->surat_permohonan_pinjaman;

        return response()->download($file);
    }

    public function lihat_pdf($id){
        $item = Peminjaman::find($id);

        return view('pages.admin.peminjaman.lihat-data-pdf', [
            'item' => $item
        ]);
    }
}
