<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;
    protected $table='jenjangs';
    protected $guarded = [];

    public function bidang()
    {
        return $this->hasMany(\App\Models\Bidang::class, 'jenjang_id','id');
    }
}
