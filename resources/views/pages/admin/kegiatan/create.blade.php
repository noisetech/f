@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah data kegiatan</h1>
        </div>


        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('kegiatan.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan"
                            class="form-control @error('nama_kegiatan') is-invalid @enderror" placeholder="Nama Kegiatan"
                            value="{{ old('nama_kegiatan') }}">
                        <div class="invalid-feedback">
                            @error('nama_kegiatan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-block btn-primary" type="submit">
                        Simpan
                    </button>
                </form>
            </div>
        </div>




    </div>
@endsection
