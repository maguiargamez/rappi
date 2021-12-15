<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMunicipio extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'cMunicipios';

    protected $fillable = ['nombre','activo'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tSitiosTuristicos()
    {
        return $this->hasMany('App\Models\TSitiosTuristico', 'municipio_id', 'id');
    }
    
}
