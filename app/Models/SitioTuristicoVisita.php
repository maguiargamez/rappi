<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SitioTuristicoVisita extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'c_sitios_turisticos_visitas';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'sitioturistico_id' => 'integer',
        'fecha' => 'datetime',
    ];


    public function sitioturistico()
    {
        return $this->belongsTo(\App\Models\Sitioturistico::class);
    }
}
