@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Edit User</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('manage-user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label><small>(biarkan kosong jika tidak diisi)</small>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="">
                    </div>

                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" class="form-control">
                            <option value="{{ $user->role }}">Data sebelumnya({{ $user->role }})</option>
                            <option value="Operator">Operator</option>
                            <option value="User">User</option>
                        </select>
                    </div>


                    <button class="btn btn-block btn-primary" type="submit">
                        Simpan
                    </button>
                </form>
            </div>
        </div>

</div>
@endsection
