<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id();
            $table->string('numero_documento');
            $table->string('nombre1');
            $table->string('nombre2')->nullable();
            $table->string('apellido1');
            $table->string('apellido2');
            $table->foreignId('tipo_documento_id')->constrained('tipos_documento');
            $table->foreignId('genero_id')->constrained('genero');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->foreignId('municipio_id')->constrained('municipios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
