<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    protected $table='pembimbings';
    protected $guarded = [];

    public function tim()
    {
        return $this->belongsTo(\App\Models\Tim::class, 'tim_id','id');
    }

    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id','id');
    }
}
