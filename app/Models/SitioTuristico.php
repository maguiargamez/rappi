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
        'municipio_id' => 'integer',
        'coordenadas' => 'array',
        'activo' => 'boolean',
    ];


    public function sitioTuristicoVisitas()
    {
        return $this->hasMany(\App\Models\SitioTuristicoVisita::class);
    }

    public function sitioTuristicoGaleria()
    {
        return $this->hasMany(\App\Models\sitioTuristicoGaleria::class)->select(['id', 'nombre', 'ubicacion', 'tamanio_bytes', 'extension', 'created_at']);
    }

    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class);
    }

    public function municipio()
    {
        return $this->belongsTo(\App\Models\Municipio::class);
    }

    public function getSingle($id){
        return SitioTuristico::withCount('sitioTuristicoVisitas')->find($id);

    }
    public function getAll(){
        return SitioTuristico::withCount('sitioTuristicoVisitas')->get();

    }

    public function getTop($top=0){
        return SitioTuristico::withCount('sitioTuristicoVisitas')->orderBy('sitio_turistico_visitas_count', 'DESC')->take($top)->get();

    }

    public function getAllTable($keyWord){
        return SitioTuristico::withCount('sitioTuristicoVisitas')
            ->orWhere('nombre', 'LIKE', $keyWord)
            ->orWhere('descripcion', 'LIKE', $keyWord)
            ->orWhere('como_llegar', 'LIKE', $keyWord)
            ->orWhere('lugares_relacionados', 'LIKE', $keyWord)
            ->orWhereHas('region', function($query) use($keyWord){
                $query->where('nombre', 'LIKE', $keyWord);
            })
            ->orWhereHas('municipio', function($query) use($keyWord){
                $query->where('nombre', 'LIKE', $keyWord);
            })
            ->paginate(10);

    }

    public function getAllTableVisits($keyWord){
        return SitioTuristico::withCount('sitioTuristicoVisitas')
            ->orWhere('nombre', 'LIKE', $keyWord)
            ->orWhere('descripcion', 'LIKE', $keyWord)
            ->orWhere('como_llegar', 'LIKE', $keyWord)
            ->orWhere('lugares_relacionados', 'LIKE', $keyWord)
            ->orWhereHas('region', function($query) use($keyWord){
                $query->where('nombre', 'LIKE', $keyWord);
            })
            ->orWhereHas('municipio', function($query) use($keyWord){
                $query->where('nombre', 'LIKE', $keyWord);
            })
            ->orderBy('sitio_turistico_visitas_count', 'DESC')
            ->get();

    }
}
