@extends('layouts.admin')

@section('content')
    <div class="container-fluid">


        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center m-0">
                    <div class="font-weight-bold text-primary">
                        <p>Tambah User</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('manage-user.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role" class="form-control">
                            <option value="">Pilih Role</option>
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
