@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Manage User</p>
                    </div>

                    <a href="{{ route('manage-user.create') }}" class="btn btn-sm btn-primary">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Kesukaan Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    @foreach ($item->kegiatan as $kegiatan)
                                        @if (empty($kegiatan))

                                        @else
                                        <li>
                                            {{ $kegiatan->nama_kegiatan }}
                                        </li>
                                        @endif
                                    @endforeach
                                </td>
                                <td>

                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('manage-user.edit', $item->id) }}" class="btn btn-sm btn-warning mr-1">
                                            Edit
                                        </a>

                                        <form action="{{ route('manage-user.destroy', $item->id) }}" method="POST">
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
