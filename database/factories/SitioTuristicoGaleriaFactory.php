<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SitioTuristicoGaleria;
use App\Models\Sitioturistico;

class SitioTuristicoGaleriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SitioTuristicoGaleria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sitio_turistico_id' => Sitioturistico::factory(),
            'nombre' => $this->faker->word,
            'ubicacion' => $this->faker->word,
            'tamanio_bytes' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'extension' => $this->faker->word,
        ];
    }
}
