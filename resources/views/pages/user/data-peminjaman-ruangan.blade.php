@extends('layouts.user')

@section('content')
    <div class="container-fluid">

        <style>
            table, tr, td{
                font-size: 14px;
            }
        </style>


        <div class="card shadow">
            <div class="card-header">
                <div class="font-weight-bold text-primary">
                    <p>Peminjaman Anda</p>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" cellspacing="0" width="100%" id="dataTable">
                        <thead>
                            <tr>
                                <th>Ruangan</th>
                                <th>Kegiatan</th>
                                <th>Kapasitas</th>
                                <th>Hari</th>
                                <th>Waktu Ruangan</th>
                                <th>Waktu Peminjaman</th>
                                <th>Status Peminjaman</th>
                                <th>Surat Peminjaman Ruangan</th>
                                <th>Aksi</th>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $item)
                                <tr>
                                    <td>{{ $item->ruangan->ruangan }}</td>
                                    <td>{{ $item->ruangan->kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $item->ruangan->kapasitas }}</td>
                                    <td>{{ $item->ruangan->hari }}</td>
                                    <td>{{ $item->ruangan->waktu_awal . ' - ' . $item->ruangan->waktu_akhir }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->status_peminjaman }}</td>
                                    <td>
                                        @if (empty($item->surat_permohonan_pinjaman))
                                            <a href="{{ route('halaman_upload_surat_peminjman_ruangan', $item->id) }}"
                                                class="btn btn-sm btn-primary">Upload surat peminjaman</a>
                                        @else
                                            sudah mengirim surat peminjaman
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status_peminjaman == 'Sudah dikembalikan' || $item->status_peminjaman == 'sudah dikembalikan')

                                        @elseif ($item->status_peminjaman == 'Berhasil' || $item->status_peminjaman == 'berhasil')

                                        <form action="{{ route('pengembalian_ruangan', $item->id) }}" method="POST">
                                            @csrf

                                            <button class="btn btn-sm btn-danger" type="submit">
                                                Pengembalian Ruangan
                                            </button>
                                        </form>
                                        @else
                                            <div class=" d-flex justify-content-center">


                                                <form action="{{ route('cancel', $item->id) }}" method="POST">
                                                    @csrf

                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                        Cancel
                                                    </button>
                                                </form>
                                            </div>
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
