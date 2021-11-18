<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSitiosTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('t_sitios_turisticos', function (Blueprint $table) {

            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('region_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->on('c_regiones');
            $table->string('nombre')->length(255);
            $table->text('descripcion');
            $table->text('como_llegar');
            $table->text('lugares_relacionados');
            $table->json('coordenadas');
            $table->boolean('activo')->default(true);
            //$table->timestamp('created_at')->useCurrent();
            //$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamps(); //Solo con SQLite
            //$table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sitios_turisticos');
    }
}
