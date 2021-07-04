<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKategori extends Model
{
    use HasFactory;
    protected $table='bidang_kategoris';
    protected $guarded = [];

    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id','id');
    }
}
