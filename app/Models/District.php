<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\DistrictTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regency;
use App\Models\Village;

/**
 * District Model.
 */
class District extends Model
{
    use DistrictTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'districts';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'regency_id'
    ];

    /**
     * District belongs to Regency.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    /**
     * District has many villages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public function sekolah()
    {
        return $this->hasMany(\App\Models\Sekolah::class, 'district_id','id');
    }

    public function pembimbing()
    {
        return $this->hasMany(\App\Models\Pembimbing::class, 'district_id','id');
    }

    public function biodata()
    {
        return $this->hasMany(\App\Models\Biodata::class, 'district_id','id');
    }

    public function anggota()
    {
        return $this->hasMany(\App\Models\Anggota::class, 'district_id','id');
    }

    public function ayahibu_ketua()
    {
        return $this->hasMany(\App\Models\OrangTua::class, 'district_id','id');
    }

    public function ayahibu_anggota()
    {
        return $this->hasMany(\App\Models\OrangTuaAnggota::class, 'district_id','id');
    }
}
