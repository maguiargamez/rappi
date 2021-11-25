<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SitioTuristicoCollection;
use App\Http\Resources\SitioTuristicoResource;
use App\Models\SitioTuristico;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="API Usuarios", version="1.0")
 *
 * @OA\Server(url="http://raapi.test")
 */

class SitioTuristicoController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/v1/sitios-turisticos/",
     *      operationId="obtenerSitiosTuristico",
     *      tags={"Sitios turisticos"},
     *      summary="Obtiene todos los sistios turisticos",
     *      description="Regresa los sitios turisticos",
     *      @OA\Response(
     *          response=200,
     *          description="Éxito"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        $sitios= SitioTuristico::getAll();
        foreach ($sitios as $sitio){
            $sitio->region= $sitio->region->nombre;
            $sitio->municipio= $sitio->municipio->nombre;
        }
        return SitioTuristicoCollection::make($sitios);
    }

    /**
     * @OA\Get(
     *     path="/api/v1/sitios-turisticos/{id}",
     *     operationId="obtenerSitioTuristicoPorId",
     *     tags={"Sitios turisticos"},
     *     summary="Mostrar un solo sitio turistico",
     *     description="Regresa el sitio turistico especifico",
     *      @OA\Parameter(
     *          name="id",
     *          description="Id del sitio turistico",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response=200,
     *         description="Éxito"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function show($id)
    {
        $sitio= SitioTuristico::getSingle($id);
        $sitio->region= $sitio->region->nombre;
        $sitio->municipio= $sitio->municipio->nombre;
        return SitioTuristicoResource::make($sitio);
    }
}
