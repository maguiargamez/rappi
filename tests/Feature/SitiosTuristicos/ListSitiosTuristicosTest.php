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

        $sitio->region= $sitio->region->nombre;
        $sitio->municipio= $sitio->municipio->nombre;
        ($sitio->sitio_turistico_visitas_count!=null) ?: $sitio->sitio_turistico_visitas_count=0;

        $response= $this->getJson( route('api.v1.sitios-turisticos.show', $sitio->id) );

        $response->assertExactJson(
            [
                'data' => [
                    'type' => 'sitios-turisticos',
                    'id' => (string) $sitio->getRouteKey(),
                    'attributes' => [
                        'slug' => $sitio->slug,
                        'region' => $sitio->region,
                        'municipio' => $sitio->municipio,
                        'nombre' => $sitio->nombre,
                        'descripcion' => $sitio->descripcion,
                        'como_llegar' => $sitio->como_llegar,
                        'lugares_relacionados' => $sitio->lugares_relacionados,
                        'coordenadas' => $sitio->coordenadas,
                        'sitio_turistico_visitas_count'=> $sitio->sitio_turistico_visitas_count,
                        'galeria' => $sitio->sitioTuristicoGaleria,
                    ],
                    'links' => [
                        'self' => route('api.v1.sitios-turisticos.show', $sitio)
                    ]
                ]
            ]
        );

    }

    /** @test */
    function can_fetch_all_sitios_turisticos()
    {
        $this->withoutExceptionHandling();
        $sitios= SitioTuristico::factory()->count(3)->create();
        foreach ($sitios as $sitio)
        {
            $sitio->region= $sitio->region->nombre;
            $sitio->municipio= $sitio->municipio->nombre;
            ($sitio->sitio_turistico_visitas_count!=null) ?: $sitio->sitio_turistico_visitas_count=0;
        }

        $response= $this->getJson(route('api.v1.sitios-turisticos.index'));

        $response->assertExactJson([
            'data' => [
                [
                    'type' => 'sitios-turisticos',
                    'id' => (string) $sitios[0]->getRouteKey(),
                    'attributes' => [
                        'slug' => $sitios[0]->slug,
                        'region' => $sitios[0]->region,
                        'municipio' => $sitios[0]->municipio,
                        'nombre' => $sitios[0]->nombre,
                        'descripcion' => $sitios[0]->descripcion,
                        'como_llegar' => $sitios[0]->como_llegar,
                        'lugares_relacionados' => $sitios[0]->lugares_relacionados,
                        'coordenadas' => $sitios[0]->coordenadas,
                        'sitio_turistico_visitas_count'=> $sitios[0]->sitio_turistico_visitas_count,
                        'galeria' => $sitios[0]->sitioTuristicoGaleria,
                    ],
                    'links' => [
                        'self' => route('api.v1.sitios-turisticos.show', $sitios[0])
                    ]
                ],
                [
                    'type' => 'sitios-turisticos',
                    'id' => (string) $sitios[1]->getRouteKey(),
                    'attributes' => [
                        'slug' => $sitios[1]->slug,
                        'region' => $sitios[1]->region,
                        'municipio' => $sitios[1]->municipio,
                        'nombre' => $sitios[1]->nombre,
                        'descripcion' => $sitios[1]->descripcion,
                        'como_llegar' => $sitios[1]->como_llegar,
                        'lugares_relacionados' => $sitios[1]->lugares_relacionados,
                        'coordenadas' => $sitios[1]->coordenadas,
                        'sitio_turistico_visitas_count'=> $sitios[1]->sitio_turistico_visitas_count,
                        'galeria' => $sitios[1]->sitioTuristicoGaleria,
                    ],
                    'links' => [
                        'self' => route('api.v1.sitios-turisticos.show', $sitios[1])
                    ]
                ],
                [
                    'type' => 'sitios-turisticos',
                    'id' => (string) $sitios[2]->getRouteKey(),
                    'attributes' => [
                        'slug' => $sitios[2]->slug,
                        'region' => $sitios[2]->region,
                        'municipio' => $sitios[2]->municipio,
                        'nombre' => $sitios[2]->nombre,
                        'descripcion' => $sitios[2]->descripcion,
                        'como_llegar' => $sitios[2]->como_llegar,
                        'lugares_relacionados' => $sitios[2]->lugares_relacionados,
                        'coordenadas' => $sitios[2]->coordenadas,
                        'sitio_turistico_visitas_count'=> $sitios[2]->sitio_turistico_visitas_count,
                        'galeria' => $sitios[2]->sitioTuristicoGaleria,
                    ],
                    'links' => [
                        'self' => route('api.v1.sitios-turisticos.show', $sitios[2])
                    ]
                ]
            ],
            'links' => [
                'self' => route('api.v1.sitios-turisticos.index')
            ]
        ]);
    }
}
