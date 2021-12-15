<?php

namespace Database\Factories;

use App\Models\CRegione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CRegioneFactory extends Factory
{
    protected $model = CRegione::class;

    public function definition()
    {
        return [
			'slug' => $this->faker->name,
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
        ];
    }
}
