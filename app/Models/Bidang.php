<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table='bidangs';
    protected $guarded = [];

    public function jenjang()
    {
        return $this->belongsTo(\App\Models\Jenjang::class, 'jenjang_id','id');
    }

    public function bidang_provinsi()
    {
        return $this->hasMany(\App\Models\BidangProvinsi::class, 'bidang_id','id');
    }

    public function juara()
    {
        return $this->hasMany(\App\Models\NisnJuara::class, 'bidang_id','id');
    }

    public function berkas()
    {
        return $this->hasMany(\App\Models\Berkas::class, 'bidang_id','id');
    }

    public function unggahan_bidang()
    {
        return $this->hasMany(\App\Models\UnggahanBidang::class, 'bidang_id','id');
    }

    public function kendala()
    {
        return $this->hasMany(\App\Models\Kendala::class, 'bidang_id','id');
    }
}
