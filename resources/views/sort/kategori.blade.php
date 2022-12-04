@extends('home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                  @if ($kategori == 'terbaca')
                    Terbaca
                  @else
                  {{-- masih kurang tepat --}}
                    @foreach ($buku as $book)
                    {{$book->first()->kategoris->name}}
                    @endforeach
                  @endif
                </div>
                <div class="card-body">
                    <div class="row">
                      @foreach ($buku as $b)
                        <div class="col-3">
                              <div class="card mt-2" style="width: 14rem;">
                                  <img src="{{asset('storage/').'/'.$b->cover}}" class="card-img-top" alt="...">
                                  <div class="card-body">
                                    <h5 class="card-title">Judul {{$b->judul}}</h5>
                                    <p class="card-text">
                                      Penulis : {{$b->penulis}}<br>
                                      Jumlah Pembaca : {{$Jumlah = count($cek->where('bukus_id', '=', $b->id))}}
                                      @guest

                                      @else
                                        @foreach ($cek as $c) 
                                          @if($c->bukus_id == $b->id && $c->pembaca == Auth::user()->name)
                                            {!! '<br>'.'<label class="bg-success ps-2 pe-2 text-light" style="border-radius: 40px;">Terbaca</label>'!!}
                                          @endif
                                        @endforeach
                                      @endguest
                                    </p>
                                    <input type="hidden" value="{{$b->id}}" name="bukus_id">
                                    <div class="d-flex">
                                      <input class="btn btn-outline-dark ms-auto" style="border-radius: 40px" type="submit" value="Baca">
                                    </div>
                                  </div>
                              </div>
                      </div>
                      @endforeach
                    </div>
                </div>

            </div>         
        </div>
    </div>
</div>

@endsection
