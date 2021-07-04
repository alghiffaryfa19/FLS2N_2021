<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnggahanBidang extends Model
{
    use HasFactory;
    protected $table='unggahan_bidangs';
    protected $guarded = [];

    public function bidang()
    {
        return $this->belongsTo(\App\Models\Bidang::class, 'bidang_id','id');
    }

    public function karya()
    {
        return $this->hasMany(\App\Models\KaryaProvinsi::class, 'unggahan_id','id');
    }
}
