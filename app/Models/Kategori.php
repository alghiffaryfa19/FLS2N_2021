<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table='kategoris';
    protected $guarded = [];

    public function bidang()
    {
        return $this->hasMany(\App\Models\BidangKategori::class, 'kategori_id','id');
    }
}
