@extends('layouts.user')

@section('content')
<div class="container-fluid">


    <div class="card shadow">
       <div class="card-header">
        <div class="d-flex justify-content-between m-0">
            <div class="font-weight-bold text-primary">
                <p>Edit Profile</p>
            </div>
        </div>
       </div>
       <div class="card-body">
            <form action="{{ route('profile.update', $user->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="">Kegiatan yang disukai:</label>
                    <br>
                    @foreach ($kegiatan as $kegiatan)
                        <input type="checkbox" name="kegiatan[]" value="{{ $kegiatan->id }}"

                    @foreach ($user->kegiatan as $result)
                    @if ($result->id == $kegiatan->id)
                    checked
                    @endif
                    @endforeach
                        >
                        <label for="">        {{ $kegiatan->nama_kegiatan }}</label>
                    @endforeach
                </div>

                <button class="btn btn-sm btn-warning" type="submit">
                    Proses Edit
                </button>
            </form>
       </div>
    </div>



</div>
@endsection
