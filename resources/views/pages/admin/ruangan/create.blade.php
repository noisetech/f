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
                <form action="{{ route('ruangan.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Ruangan</label>
                        <input type="text" name="ruangan" class="form-control @error('ruangan') is-invalid @enderror"
                            placeholder="Ruangan" value="{{ old('ruangan') }}">
                        @error('ruangan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Kegiatan</label>
                        <select name="kegiatan_id" class="form-control  @error('kegiatan_id') is-invalid @enderror">
                            <option value="">Pilih Kegiatan</option>
                            @foreach ($kegiatan as $kegiatan)
                                <option value="{{ $kegiatan->id }}">{{ $kegiatan->nama_kegiatan }}</option>
                            @endforeach
                        </select>
                        @error('kegiatan_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Kapasitas</label>
                        <input type="text" name="kapasitas" class="form-control @error('kapasitas') is-invalid @enderror"
                            placeholder="Kapasitas" value="{{ old('kapasitas') }}">
                        @error('kapasitas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Hari</label>
                        <input type="date" name="hari" class="form-control @error('hari') is-invalid @enderror">
                        @error('hari')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Waktu Awal</label>
                        <input type="time" name="waktu_awal" class="form-control @error('waktu_awal') is-invalid @enderror"
                            placeholder="Waktu Awal" value="{{ old('waktu_awal') }}">
                        @error('waktu_awal')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Waktu Akhir</label>
                        <input type="time" name="waktu_akhir"
                            class="form-control @error('waktu_akhir') is-invalid @enderror" placeholder="Kapasitas"
                            value="{{ old('waktu_akhir') }}">
                        @error('waktu_akhir')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="btn btn-block btn-primary" type="submit">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
