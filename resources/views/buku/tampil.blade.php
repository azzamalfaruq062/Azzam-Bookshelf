@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h3>Data Buku</h3>
        <a class="btn btn-success btn-sm mt-2" href="{{route('buku.create')}}">Tambah data +</a>
        <table class="table table-hover mt-2">
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Cover</th>
                <th>Status</th>
                @if(Auth::user()->role == 'admin')
                    <th>Action</th>
                @endif
            </tr>
            @foreach ($data as $a)                
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$a->isbn}}</td>
                <td>{{$a->judul}}</td>
                <td>{{$a->penulis}}</td>
                <td>{{$a->isi}}</td>
                <td>{{$a->tanggal}}</td>
                <td>{{$a->kategoris->name}}</td>
                <td><img src="{{asset('storage/').'/'.$a->cover}}" width="30%"></td>
                <td>{{$a->status}}</td>
                @if(Auth::user()->role == 'admin')
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{route('buku.edit', $a->id)}}">Edit</a>
                        <a class="btn btn-danger btn-sm" href="{{route('deletbuku', $a->id)}}">Hapus</a>
                    </td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection