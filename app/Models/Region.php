<?php

namespace App\Models;

use App\Models\Catalogo\Cargo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    protected $table = 'c_regiones';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public static function comboActivos($array=[]){
        $query= Region::select('id', 'nombre');
        $query= $query->orderBy('nombre','ASC')->pluck('nombre','id')->prepend('--Región--', 0)->all();
        return $query;
    }

    public function sitioTuristicos()
    {
        return $this->hasMany(\App\Models\SitioTuristico::class);
    }
}
