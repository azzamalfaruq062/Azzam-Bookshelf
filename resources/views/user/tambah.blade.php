@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('user.store')}}" method="POST">
            @csrf
            <div class="mb-2">
                <label>Nama :</label>
                <input class="form-control" type="text" name="name" >
            </div>
            <div class="mb-2">
                <label>Email :</label>
                <input class="form-control" type="email" name="email" >
            </div>
            <div class="mb-2">
                <label>Password :</label>
                <input class="form-control" type="password" name="password" >
            </div>
            <div class="mb-2">
                <label>Role :</label>
                <select class="form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="mb-2">
                <label>Status :</label>
                <select class="form-control" name="status">
                    <option value="aktif">Aktif</option>
                    <option value="tidak">Tidak Aktif</option>
                </select>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection