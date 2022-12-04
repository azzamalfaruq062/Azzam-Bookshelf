<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pembaca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'editor'){
            $data = Buku::all()->where('penulis', '=', Auth::user()->name);
        }else{
            $data = Buku::all();
        }
        return view('buku.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('buku.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Buku::create([
            'isbn' => $request->isbn,
            'judul' => $request->judul,
            'penulis' => Auth::user()->name,
            'isi' => $request->isi,
            'status' => 'show',
            'tanggal' => $request->tanggal,
            'kategoris_id' => $request->kategoris_id,
            'cover' => $request->file('cover')->store('img'),
        ]);
        return redirect('buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        return view('buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        if($request->file('cover')){
            $buku->isbn = $request->isbn;
            $buku->judul = $request->judul;
            $buku->penulis = $buku->penulis;
            $buku->isi = $request->isi;
            $buku->status = $request->status;
            $buku->kategoris_id = $request->kategoris_id;
            $buku->cover = $request->file('cover')->store('img');
            $buku->save();
        }else{
            $buku->isbn = $request->isbn;
            $buku->judul = $request->judul;
            $buku->penulis = $buku->penulis;
            $buku->isi = $request->isi;
            $buku->status = $request->status;
            $buku->kategoris_id = $request->kategoris_id;
            $buku->cover = $buku->cover;
            $buku->save();
        }
        return redirect('buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect('buku');
    }

    // Menampilkan buku di depan berdasarkan kategori
    public function depan(){
        // menampilkan kategori
        $data = DB::table('kategoris')->get();
        //mengambil semua buku kemudian dikasi kondisi pada blade untuk menyamakan kategoris id bila sama maka akan di tampilkan
        $buku = Buku::all()->where('status', '=', 'show');
        // mengambil pembaca dan dibandingkan dg buku untuk mengecek status
        $cek = DB::table('pembacas')->get();
        
        return view('welcome', compact('data','buku', 'cek'));
    }

    public function sort(Request $request){
        // Mengambil kategori untuk data sorting
        $data = DB::table('kategoris')->get();
        // mengambil inputan dari sorting
        $kategori = $request->kategori;
        // memmbuat objek dengan nama coba
        $coba = new read($kategori);

        if($kategori == 'terbaca'){
            $buku = $coba->sortRead();
        }else{
            $buku = $coba->sortKategori();
        }

        // dd($buku);
        return view('sort.kategori', compact('buku', 'data'));

    }
}


// class sort
class sort{
    public function __construct($kategori){
        $this->kategori = $kategori;
    }
    // untuk sort buku berdasarkan Kategori
    public function sortKategori(){
        $buku = Buku::all()->where('kategoris_id', '=', $this->kategori);
        return $buku;
    }
}

//clas read extends dari clas sort 
class read extends sort{
    // sort berdasarkan terbaca
    public function sortRead(){
        if($this->kategori == 'terbaca'){
            $data = DB::table('pembacas')
            ->join('bukus', 'bukus.id', '=', 'pembacas.bukus_id')
            ->get();
            return $data;
        }
    }
}
