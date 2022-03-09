@extends('layouts.user')

@section('content')
<div class="container-fluid">


    <div class="card shadow">
       <div class="card-header">
        <div class="d-flex justify-content-between m-0">
            <div class="font-weight-bold text-primary">
                <p>Profile</p>
            </div>
        </div>
       </div>
       <div class="card-body">
           <div class="row">
                <div class="col-12">
                    <table class="table text-center table-bordered">
                       <thead>
                           <tr>
                               <th>Nama</th>
                               <th>Email</th>
                               <th>Kegiatan yang disukai</th>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($user as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($item->kegiatan as $kegiatan)
                                            <li>
                                                {{ $kegiatan->nama_kegiatan }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                           @endforeach
                       </tbody>
                    </table>

                    <div class="row mt-3">
                        <div class="col-4">
                            <a href="{{ route('profile.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </div>



</div>
@endsection
