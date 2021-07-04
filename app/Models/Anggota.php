<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table='anggotas';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id','id');
    }

    public function tim()
    {
        return $this->belongsTo(\App\Models\Tim::class, 'tim_id','id');
    }

    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id','id');
    }

    public function ayahibu_anggota()
    {
        return $this->hasOne(\App\Models\OrangTuaAnggota::class, 'anggota_id','id');
    }
}
