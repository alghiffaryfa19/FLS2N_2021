<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTuaAnggota extends Model
{
    use HasFactory;
    protected $table='orang_tua_anggotas';
    protected $guarded = [];

    public function anggota()
    {
        return $this->belongsTo(\App\Models\Anggota::class, 'anggota_id','id');
    }

    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id','id');
    }
}
