<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitioTuristico extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 't_sitios_turisticos';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'region_id' => 'integer',
        'coordenadas' => 'array',
        'activo' => 'boolean',
    ];


    public function sitioTuristicoVisitas()
    {
        return $this->hasMany(\App\Models\SitioTuristicoVisita::class);
    }

    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class);
    }
}
