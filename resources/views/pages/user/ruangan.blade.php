@extends('layouts.user')

@section('content')
    <div class="container-fluid">

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card shadow">
           <div class="card-header">
            <div class="font-weight-bold text-primary">
                List Ruangan
            </div>
           </div>

           <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center" cellspacing="0" width="100%" id="dataTable">
                    <thead>
                        <tr>
                            <th>Ruangan</th>
                            <th>Kapasitas</th>
                            <th>Kegiatan</th>
                            <th>Hari</th>
                            <th>Waktu Ketersediaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->ruangan }}</td>
                                <td>{{ $item->kapasitas }}</td>
                                <td>{{ $item->kegiatan->nama_kegiatan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->hari)->isoFormat('dddd') . ' ,'. \Carbon\Carbon::parse($item->hari)->isoFormat('D-MM-Y')}}</td>
                                <td>{{ $item->waktu_awal . ' - ' . $item->waktu_akhir }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @if ($item->status == 'Tidak tersedia')

                                    @else
                                     <form action="{{ route('proses_pinjam_ruangan', $item->id) }}" method="POST">
                                        @csrf

                                        <button class="btn btn-sm btn-primary" type="submit">
                                            Pinjam
                                        </button>
                                    </form>
                                    @endif

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
