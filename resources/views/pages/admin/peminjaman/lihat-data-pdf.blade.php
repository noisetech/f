@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pengecekan Surat Permohonan Peminjaman Ruangan</h1>
        </div>


        <div class="card shadow">
            <div class="card-body">
              <div class="col-lg-8 col-md-8 col-sm-6">
                <div class="card">
                    <iframe src="{{ Storage::url($item->surat_permohonan_pinjaman) }}" frameborder="0" width="900" height="900"></iframe>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-6 mt-4">
                <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-sm btn-warning">Ubah Status</a>
              </div>
            </div>
        </div>

</div>
@endsection
