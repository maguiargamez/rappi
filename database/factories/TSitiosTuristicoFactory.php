<?php

namespace Database\Factories;

use App\Models\TSitiosTuristico;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TSitiosTuristicoFactory extends Factory
{
    protected $model = TSitiosTuristico::class;

    public function definition()
    {
        return [
			'slug' => $this->faker->name,
			'region_id' => $this->faker->name,
			'municipio_id' => $this->faker->name,
			'nombre' => $this->faker->name,
			'descripcion' => $this->faker->name,
			'como_llegar' => $this->faker->name,
			'lugares_relacionados' => $this->faker->name,
			'coordenadas' => $this->faker->name,
			'activo' => $this->faker->name,
        ];
    }
}
