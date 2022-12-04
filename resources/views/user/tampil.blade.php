@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Data User</h3>
        <a class="btn btn-success btn-sm mt-2" href="{{route('user.create')}}">Tambah data +</a>
        <table class="table table-hover mt-2">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $u)                
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->role}}</td>
                <td>
                    @if($u->status == 'aktif')
                        <label class="bg-success ps-3 pe-3 text-light" style="border-radius: 40px">{{$u->status}}</label>
                    @else
                        <label class="bg-warning ps-3 pe-3 text-light" style="border-radius: 40px">{{$u->status}}</label>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('user.edit', $u->id)}}">Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{route('deletuser', $u->id)}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection