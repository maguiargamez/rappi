<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SitioTuristicoResource extends JsonResource
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
            'type' => 'sitios-turisticos',
            'id' => (string)$this->resource->getRouteKey(),
            'attributes' => [
                'slug' => $this->resource->slug,
                'region' => $this->resource->region,
                'nombre' => $this->resource->nombre,
                'descripcion' => $this->resource->descripcion,
                'como_llegar' => $this->resource->como_llegar,
                'lugares_relacionados' => $this->resource->lugares_relacionados,
                'coordenadas' => $this->resource->coordenadas,
                'sitio_turistico_visitas_count' => (integer)$this->resource->sitio_turistico_visitas_count,
                'galeria' => $this->resource->sitioTuristicoGaleria,
            ],
            'links' => [
                'self' => route('api.v1.sitios-turisticos.show', $this->resource)
            ]
        ];
    }
}
