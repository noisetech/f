<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = Ruangan::with(['kegiatan'])->get()
            ->sortByDesc('waktu_awal')
            ->sortByDesc('waktu_akhir')
            ->sortByDesc('hari');

        return view('pages.admin.ruangan.index', [
            'ruangan' => $ruangan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();

        return view('pages.admin.ruangan.create', [
            'kegiatan' => $kegiatan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ruangan' => 'required|string|max:255',
            'kegiatan_id' => 'required|exists:kegiatan,id',
            'kapasitas' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'waktu_awal' => 'required',
            'waktu_akhir' => 'required'
        ]);

        Ruangan::create([
            'ruangan' => $request->ruangan,
            'kegiatan_id' => $request->kegiatan_id,
            'kapasitas' => $request->kapasitas,
            'hari' => $request->hari,
            'waktu_awal' => $request->waktu_awal,
            'waktu_akhir' => $request->waktu_akhir,
            'status' => 'Tersedia'
        ]);

        return redirect()->route('ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruangan = Ruangan::find($id);

        $kegiatan = Kegiatan::all();

        return view('pages.admin.ruangan.edit', [
            'ruangan' => $ruangan,
            'kegiatan' => $kegiatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Ruangan::find($id);

        $data = $request->all();

        $item->update($data);

        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Ruangan::find($id);

        $item->delete();

        return redirect()->route('ruangan.index');
    }
}