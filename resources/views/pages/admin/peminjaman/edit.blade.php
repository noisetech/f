@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Peminjaman</h1>
        </div>


        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('peminjaman.update', $item->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="">Status Peminjaman</label>
                        <select name="status_peminjaman" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="Berhasil">Berhasil</option>
                            <option value="Gagal">Gagal</option>
                        </select>
                    </div>

                    <button class="btn btn-sm btn-warning" type="submit">
                        Ubah
                    </button>
                </form>
            </div>
        </div>

</div>
@endsection
