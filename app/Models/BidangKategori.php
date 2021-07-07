<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKategori extends Model
{
    use HasFactory;
    protected $table='bidang_kategoris';
    protected $guarded = [];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class, 'kategori_id','id');
    }
}
