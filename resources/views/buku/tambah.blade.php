@extends('layouts.app')

@section('content')
<div class="container">
   <div>
        <form class="col-6" action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label>ISBN :</label>
                <input class="form-control" type="text" name="isbn" >
            </div>
            <div class="mb-2">
                <label>Judul :</label>
                <input class="form-control" type="text" name="judul" >
            </div>
            {{-- <div class="mb-2">
                <label>Penulis :</label>
                <input class="form-control" type="text" name="penulis" >
            </div> --}}
            <div class="mb-2">
                <label>Tanggal :</label>
                <input class="form-control" type="date" name="tanggal" >
            </div>
            <div class="mb-2">
                <label>Status :</label>
                <select class="form-control" name="status">
                    <option value="show">Show</option>
                    <option value="hidden">Hidden</option>
                </select>
            </div>
            <div class="mb-2">
                <label>Kategori :</label>
                <select class="form-control" name="kategoris_id">
                    @foreach ($kategori as $k)
                        <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label>Cover :</label>
                <input class="form-control" type="file" name="cover" >
            </div>
            <div class="mb-2">
                <label>Isi Buku :</label>
                <textarea class="form-control" name="isi" rows="20"></textarea>
            </div>
            <input class="btn btn-success btn-sm" type="submit" value="submit">
        </form>
   </div>
</div>
@endsection