<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryaProvinsi extends Model
{
    use HasFactory;
    protected $table='karya_provinsis';
    protected $guarded = [];

    public function unggahan_bidang()
    {
        return $this->belongsTo(\App\Models\UnggahanBidang::class, 'unggahan_id','id');
    }

    public function tim()
    {
        return $this->belongsTo(\App\Models\Tim::class, 'tim_id','id');
    }
}
