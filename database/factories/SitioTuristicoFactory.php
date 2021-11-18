<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Region;
use App\Models\SitioTuristico;

class SitioTuristicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SitioTuristico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug,
            'region_id' => Region::factory(),
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->text,
            'como_llegar' => $this->faker->text,
            'lugares_relacionados' => $this->faker->text,
            'coordenadas' => '{}',
            'activo' => $this->faker->boolean,
        ];
    }
}
