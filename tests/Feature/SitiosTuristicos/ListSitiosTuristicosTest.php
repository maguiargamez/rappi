<?php

namespace Tests\Feature\SitiosTuristicos;

use App\Models\SitioTuristico;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListSitiosTuristicosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_fetch_a_single_sitio_turistico()
    {
        $this->withoutExceptionHandling();
        $sitio= SitioTuristico::factory()->create();
        $response= $this->getJson( route('api.v1.sitios-turisticos.show', $sitio) );

        $response->assertExactJson(
            [
                'data' => [
                    'type' => 'sitios-turisticos',
                    'id' => (string) $sitio->getRouteKey(),
                    'attributes' => [
                        'nombre' => $sitio->nombre,
                        'descripcion' => $sitio->descripcion,
                        'slug' => $sitio->slug
                    ]
                ],
                'links' => [
                    'self' => route('api.v1.sitios-turisticos.show', $sitio)
                ]
            ]
        );

    }
}
