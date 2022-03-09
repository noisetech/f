@extends('layouts.user')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pilih kegiatan yang disukai</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('proses_input_kegiatan_yang_disukai') }}" method="POST">
                @csrf

                <div class="form-group">
                    <p>Kegiatan:</p>
                    @foreach ($kegiatan as $kegiatan)
                        <input type="checkbox" name="kegiatan[]" value="{{ $kegiatan->id }}">
                        {{ $kegiatan->nama_kegiatan }}
                    @endforeach
                </div>

                <button class="btn btn-block btn-primary" type="submit">
                    Proses
                </button>
            </form>
        </div>
    </div>



</div>
@endsection
