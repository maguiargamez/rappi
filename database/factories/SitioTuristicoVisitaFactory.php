<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SitioTuristicoVisita;
use App\Models\Sitioturistico;

class SitioTuristicoVisitaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SitioTuristicoVisita::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'sitio_turistico_id' => Sitioturistico::factory(),
            'ip' => $this->faker->ipv4,
            'fecha' => $this->faker->dateTime(),
        ];
    }
}
