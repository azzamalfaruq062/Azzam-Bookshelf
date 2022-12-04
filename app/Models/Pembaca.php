<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembaca extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function bukus(){
        return $this->belongsTo(Buku::class);
    }
}
