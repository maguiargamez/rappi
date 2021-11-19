<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SitioTuristicoVisitaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'type' => 'sitios-turisticos-visitas',
            'id' => (string)$this->resource->getRouteKey(),
            'attributes' => [
                'sitio_turistico_id' => $this->resource->sitio_turistico_id,
                'ip' => $this->resource->ip,
                'fecha' => (string) $this->resource->fecha,
            ],
            'links' => [
                'self' => route('api.v1.sitios-turisticos.show', $this->resource->id)
            ]
        ];
    }

    public function toResponse($request)
    {
        return parent::toResponse($request)->withHeaders(
            [
                'Location' => route('api.v1.sitios-turisticos.show', $this->resource)
            ]
        );
    }
}
