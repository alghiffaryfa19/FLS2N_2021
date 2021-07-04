<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;
    protected $table='tims';
    protected $guarded = [];

    public function provinsi()
    {
        return $this->belongsTo(\App\Models\Province::class, 'province_id','id');
    }

    public function sekolah()
    {
        return $this->belongsTo(\App\Models\Sekolah::class, 'sekolah_id','id');
    }

    public function bidang_provinsi()
    {
        return $this->belongsTo(\App\Models\BidangProvinsi::class, 'bidang_id','id');
    }

    public function pembimbing()
    {
        return $this->hasOne(\App\Models\Pembimbing::class, 'tim_id','id');
    }

    public function biodata()
    {
        return $this->hasOne(\App\Models\Biodata::class, 'tim_id','id');
    }

    public function anggota()
    {
        return $this->hasOne(\App\Models\Anggota::class, 'tim_id','id');
    }

    public function unggahan()
    {
        return $this->hasMany(\App\Models\UnggahanBerkas::class, 'tim_id','id');
    }

    public function karya_provinsi()
    {
        return $this->hasMany(\App\Models\KaryaProvinsi::class, 'tim_id','id');
    }
}
