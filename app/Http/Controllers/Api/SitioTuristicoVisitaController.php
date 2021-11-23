<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SitioTuristicoVisitaResource;
use App\Models\SitioTuristicoVisita;
use Illuminate\Http\Request;

class SitioTuristicoVisitaController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/v1/sitios-turisticos-visitas/",
     *      operationId="agregarSitioTuristicoVisita",
     *      tags={"Sitios turisticos"},
     *      summary="Agrega una visita al sistio turistico",
     *      description="Regresa el sitio turistico",
     *      @OA\Parameter(
     *     name="dato",
     *     in="path",
     *     description="Objeto JSON con datos de la visita",
     *     required=true,
     *     @OA\Schema(
     *       @OA\Property(
     *         property="data",
     *         type="object",
     *         @OA\Property(
     *           property="type",
     *           type="string",
     *           default="sitios-turisticos-visitas",
     *           example="sitios-turisticos-visitas",
     *         ),
     *         @OA\Property(
     *           property="attributes",
     *           type="object",
     *           @OA\Property(
     *             property="sitio_turistico_id",
     *             type="number",
     *             default=1,
     *             example=1
     *           ),
     *           @OA\Property(
     *             property="ip",
     *             type="string",
     *             example="192.168.1.1"
     *           ),
     *           @OA\Property(
     *             property="fecha",
     *             type="datetime",
     *
     *             example="2021-11-19 13:39:00"
     *           ),
     *         )

     *       )
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Details of the customer"
     *   ),
     *   @OA\Response(
     *     response=400,
     *     description="Email required"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Customer does not exist"
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="an ""unexpected"" error"
     *   )
     * )
     */


    public function create(Request $request)
    {
        $visita = SitioTuristicoVisita::create([
            'sitio_turistico_id' => $request->input('data.attributes.sitio_turistico_id'),
            'ip' => $request->input('data.attributes.ip'),
            'fecha' => $request->input('data.attributes.fecha'),
        ]);

        return SitioTuristicoVisitaResource::make($visita);
    }
}
