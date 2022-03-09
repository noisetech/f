@extends('layouts.user')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Upload Surat Peminjaman</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('proses_upload_surat_peminjaman_ruangan', $peminjaman->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="">Surat Peminjaman Ruangan:</label>
                        <input type="file" name="surat_permohonan_pinjaman"
                            class="form-control-file @error('surat_permohonan_pinjaman') is-invalid @enderror">
                        @error('surat_permohonan_pinjaman')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="btn btn-block btn-primary" type="submit">
                        Proses
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
