<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Province Model.
 */
class Province extends Model
{
    use ProvinceTrait;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * Province has many regencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    public function bidang_provinsi()
    {
        return $this->hasMany(\App\Models\BidangProvinsi::class, 'province_id','id');
    }

    public function pengunggah()
    {
        return $this->hasMany(\App\Models\BidangProvinsi::class, 'province_id','id');
    }

    public function tim()
    {
        return $this->hasMany(\App\Models\Tim::class, 'province_id','id');
    }
}
