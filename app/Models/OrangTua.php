<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;
    protected $table='orang_tuas';
    protected $guarded = [];

    public function biodata()
    {
        return $this->belongsTo(\App\Models\Biodata::class, 'biodata_id','id');
    }

    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id','id');
    }
}
