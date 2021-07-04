<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NisnJuara extends Model
{
    use HasFactory;
    protected $table='nisn_juaras';
    protected $guarded = [];

    public function bidang()
    {
        return $this->belongsTo(\App\Models\Bidang::class, 'bidang_id','id');
    }
}
