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
            'data' => [
                'type' => 'sitios-turisticos',
                'id' => (string) $this->resource->getRouteKey(),
                'attributes' => [
                    'nombre' => $this->resource->nombre,
                    'descripcion' => $this->resource->descripcion,
                    'slug' => $this->resource->slug
                ]
            ],
            'links' => [
                'self' => route('api.v1.sitios-turisticos.show', $this->resource)
            ]
        ];
    }
}
