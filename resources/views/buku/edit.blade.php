@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('buku.update', $buku->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-2">
                <label>ISBN :</label>
                <input class="form-control" type="text" name="isbn" value="{{$buku->isbn}}">
            </div>
            <div class="mb-2">
                <label>Judul :</label>
                <input class="form-control" type="text" name="judul" value="{{$buku->judul}}">
            </div>
            {{-- <div class="mb-2">
                <label>Penulis :</label>
                <input class="form-control" type="text" name="penulis" value="{{$buku->penulis}}">
            </div> --}}
            <div class="mb-2">
                <label>Kategori :</label>
                <select class="form-control" name="kategoris_id">
                    <option value="{{$buku->kategoris_id}}">{{$buku->kategoris->name}}</option>
                    @foreach ($kategori as $k)
                    <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                </select>
            </div>
            @if (Auth::user()->role == 'admin')                
                <div class="mb-2">
                    <label>Status :</label>
                    <select class="form-control" name="status">
                        <option value="{{$buku->status}}" selected>{{ Str::ucfirst($buku->status)}}</option>
                        <option value="show">Show</option>
                        <option value="hidden">Hidden</option>
                    </select>
                </div>
            @endif
            <div class="mb-2">
                <label>Cover :</label>
                <input class="form-control" type="file" name="cover" >
            </div>
            <div class="mb-2">
                <label>Isi :</label>
                <textarea class="form-control" name="isi" rows="20">{{$buku->isi}}</textarea>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection