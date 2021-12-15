<?php

namespace Database\Factories;

use App\Models\CMunicipio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CMunicipioFactory extends Factory
{
    protected $model = CMunicipio::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'activo' => $this->faker->name,
        ];
    }
}
