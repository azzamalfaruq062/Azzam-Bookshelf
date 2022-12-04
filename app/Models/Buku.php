<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function pembacas(){
        return $this->hasMany(Pembaca::class);
    }
    public function kategoris(){
        return $this->belongsTo(Kategori::class);
    }
}
