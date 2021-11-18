<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSitiosTuristicosGaleria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sitios_turisticos_galeria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sitio_turistico_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->on('t_sitios_turisticos');
            $table->string('nombre');
            $table->string('ubicacion');
            $table->integer('tamanio_bytes');
            $table->string('extension');
            //$table->timestamp('created_at')->useCurrent();
            //$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps(); //Solo con SQLite
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sitios_turisticos_galeria');
    }
}
