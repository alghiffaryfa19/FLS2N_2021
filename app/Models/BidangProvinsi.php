<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangProvinsi extends Model
{
    use HasFactory;
    protected $table='bidang_provinsis';
    protected $guarded = [];

    public function bidang()
    {
        return $this->belongsTo(\App\Models\Bidang::class, 'bidang_id','id');
    }

    public function province()
    {
        return $this->belongsTo(\App\Models\Province::class, 'province_id','id');
    }

    public function tim()
    {
        return $this->hasMany(\App\Models\Tim::class, 'bidang_id','id');
    }

    public function pengunggah()
    {
        return $this->hasMany(\App\Models\Tim::class, 'bidang_id','id');
    }
}
