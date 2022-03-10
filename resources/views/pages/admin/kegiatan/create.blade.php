@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Tambah Kegiatan</p>
                    </div>

                </div>
            </div>
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
