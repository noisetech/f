@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Kegiatan</p>
                    </div>

                    <a href="{{ route('kegiatan.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-sm fa-plus-circle"></i>
                        Tambah data
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" cellspacing="0" width="100%" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nama Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatan as $item)
                                <tr>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td>
                                        <a href="{{ route('kegiatan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST"
                                            style="display: inline-block">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</div>
@endsection
