<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TSitiosTuristico extends Model
{
	use HasFactory;

    public $timestamps = true;

    protected $table = 't_sitios_turisticos';

    protected $fillable = ['slug','region_id','municipio_id','nombre','descripcion','como_llegar','lugares_relacionados','coordenadas','activo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cMunicipio()
    {
        return $this->hasOne('App\Models\CMunicipio', 'id', 'municipio_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cRegione()
    {
        return $this->hasOne('App\Models\CRegione', 'id', 'region_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tSitiosTuristicosGalerias()
    {
        return $this->hasMany('App\Models\TSitiosTuristicosGalerium', 'sitio_turistico_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tSitiosTuristicosVisitas()
    {
        return $this->hasMany('App\Models\TSitiosTuristicosVisita', 'sitio_turistico_id', 'id');
    }

}
