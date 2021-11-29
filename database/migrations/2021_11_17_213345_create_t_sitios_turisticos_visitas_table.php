<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSitiosTuristicosVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('t_sitios_turisticos_visitas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sitio_turistico_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate()->on('t_sitios_turisticos');
            $table->ipAddress('ip')->nullable();
            $table->dateTime('fecha');
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
        Schema::dropIfExists('t_sitios_turisticos_visitas');
    }
}
