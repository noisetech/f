@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <style>
            table, tr, td{
                font-size: 12px;
            }

            a, .btn{
                font-size: 12px;
            }

            button .btn{
                font-size: 12px;
            }


        </style>



        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Ruangan</p>
                    </div>

                    <a href="{{ route('ruangan.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-sm fa-plus-circle"></i>
                        Tambah data
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-center table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Ruangan</th>
                                <th>Kegiatan</th>
                                <th>Kapasitas</th>
                                <th>Hari</th>
                                <th>Waktu Awal</th>
                                <th>Waktu Akhir</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangan as $key => $item)
                                <tr>
                                    <td>{{ $item->ruangan }}</td>
                                    <td>{{ $item->kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $item->kapasitas }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->hari)->isoFormat('dddd') . ' ,'. \Carbon\Carbon::parse($item->hari)->isoFormat('D-MM-Y')}}</td>
                                    <td>{{ $item->waktu_awal }}</td>
                                    <td>{{ $item->waktu_akhir }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>

                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="{{ route('ruangan.edit', $item->id) }}" class="btn btn-sm btn-warning mr-1">
                                                Edit
                                            </a>

                                            <form action="{{ route('ruangan.destroy', $item->id) }}" method="POST"
                                                style="display: inline-block">
                                                @csrf
                                                @method('delete')

                                                <button class="btn btn-sm btn-danger" type="submit">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>

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
