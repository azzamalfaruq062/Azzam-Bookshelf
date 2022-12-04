@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('user.update', $data->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>Nama :</label>
                <input class="form-control" type="text" name="name" value="{{$data->name}}">
            </div>
            <div class="mb-2">
                <label>Role :</label>
                <select class="form-control" name="role">
                    <option value="{{$data->role}}" selected>{{Str::ucfirst($data->role)}}</option>
                    <option value="admin">Admin</option>
                    <option value="editor">Editor</option>
                    <option value="User">User</option>
                </select>
            </div>
            <div class="mb-2">
                <label>Status :</label>
                <select class="form-control" name="status">
                    <option value="{{$data->status}}" selected>{{Str::ucfirst($data->status)}}</option>
                    <option value="aktif">Aktif</option>
                    <option value="tidak">Tidak Aktif</option>
                </select>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection