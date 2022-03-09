@extends('layouts.admin')

@section('content')
    <div class="container-fluid">



        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Edit Kegiatan</p>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan"
                            class="form-control @error('nama_kegiatan') is-invalid @enderror" placeholder="Nama Kegiatan"
                            value="{{ $kegiatan->nama_kegiatan }}">
                        <div class="invalid-feedback">
                            @error('nama_kegiatan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-block btn-warning" type="submit">
                        Ubah
                    </button>
                </form>
            </div>
        </div>




    </div>
@endsection
