<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanYangDisukaiController extends Controller
{
    public function opsi(){

        $kegiatan  = Kegiatan::all();
        return view('pages.user.opsi-kegiatan', [
            'kegiatan' => $kegiatan
        ]);
    }

    public function proses_input_kegiatan_yang_disukai(Request $request){
        $id = User::where('id', Auth::user()->id)->select('id')->first();

        $user = $id;

        $user->kegiatan()->attach($request->kegiatan);

        return redirect()->route('list-ruangan');
    }
}
