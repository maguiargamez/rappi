<?php

namespace Tests\Feature\SitiosTuristicos;

use App\Models\SitioTuristico;
use App\Models\SitioTuristicoVisita;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use PHPUnit\Util\Test;
use Tests\TestCase;

class CreateSitiosTuristicosVisitasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_sitios_turisticos_visitas()
    {
        $this->withoutExceptionHandling();
        $sitio= SitioTuristico::factory()->create();
        $response= $this->postJson(route('api.v1.sitios-turisticos-visitas.store'),
        [
            'data' => [
                'type'=> 'sitios-turisticos-visitas',
                'attributes' => [
                    'sitio_turistico_id' => $sitio->id,
                    'ip' => '192.168.1.1',
                    'fecha' => '2021-11-19 03:11:18',
                ]
            ]
        ]);
        $response->assertCreated();

        $visita= SitioTuristicoVisita::first();

        $response->assertHeader(
            'Location',
            route('api.v1.sitios-turisticos.show', $visita)
        );

        $response->assertExactJson([
            'data'=>[
                'type'=> 'sitios-turisticos-visitas',
                'id'=> (string) $visita->getRouteKey(),
                'attributes' => [
                    'sitio_turistico_id' => $sitio->id,
                    'ip' => '192.168.1.1',
                    'fecha' => '2021-11-19 03:11:18',
                ],
                'links'=> [
                    'self'=> route('api.v1.sitios-turisticos.show', $visita)
                ]
            ]
        ]);
    }

    /** @test */
    public function ip_id_is_required()
    {
        //$this->withoutExceptionHandling();
        $sitio= SitioTuristico::factory()->create();
        $response= $this->postJson(route('api.v1.sitios-turisticos-visitas.store'),
            [
                'data' => [
                    'type'=> 'sitios-turisticos-visitas',
                    'attributes' => [
                        'sitio_turistico_id' => $sitio->id,
                        //'ip' => '192.168.1.1',
                        'fecha' => '2021-11-19 03:11:18',
                    ]
                ]
            ])->dump();

        $response->assertJsonApiValidationErrors('ip');
    }

    /** @test */
    public function fecha_id_is_required()
    {
        //$this->withoutExceptionHandling();
        $sitio= SitioTuristico::factory()->create();
        $response= $this->postJson(route('api.v1.sitios-turisticos-visitas.store'),
            [
                'data' => [
                    'type'=> 'sitios-turisticos-visitas',
                    'attributes' => [
                        'sitio_turistico_id' => $sitio->id,
                        'ip' => '192.168.1.1',
                        //'fecha' => '2021-11-19- 03:11:18',
                    ]
                ]
            ])->dump();

        $response->assertJsonApiValidationErrors('fecha');
    }
}
