<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CRegione extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'cRegiones';

    protected $fillable = ['slug','nombre','descripcion'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tSitiosTuristicos()
    {
        return $this->hasMany('App\Models\TSitiosTuristico', 'region_id', 'id');
    }
    
}
