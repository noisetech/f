@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card shadow">

            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Peminjaman</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-hover" cellspacing="0" width="100%" id="dataTable">
                        <thead>
                            <tr>
                                <th>Peminjam</th>
                                <th>Ruangan</th>
                                <th>Kegiatan</th>
                                <th>Hari Peminjaman</th>
                                <th>Status Peminjaman</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $item)
                            <tr>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->ruangan->ruangan }}</td>
                                <td>{{ $item->ruangan->kegiatan->nama_kegiatan }}</td>
                                <td>{{ $item->ruangan->hari }}</td>
                                <td>
                                    {{ $item->status_peminjaman }}
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}
                                </td>
                                <td>
                                    @if ($item->status_peminjaman == 'Sudah dikembalikan' || $item->status_peminjaman == 'Berhasil')

                                    @else
                                    <a href="{{ route('lihat_pdf', $item->id) }}" class="btn btn-sm btn-primary">Periksa</a>
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
