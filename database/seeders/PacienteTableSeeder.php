<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tiposDocumento = DB::table('tipos_documento')->pluck('id');
        $generos = DB::table('genero')->pluck('id');
        $departamentos = DB::table('departamentos')->pluck('id');
        $municipios = DB::table('municipios')->pluck('id');

        DB::table('paciente')->insert([
            'tipo_documento_id' => $tiposDocumento->random(),
            'numero_documento' => '1000',
            'nombre1' => 'Juan',
            'nombre2' => 'Carlos',
            'apellido1' => 'Perez',
            'apellido2' => 'Gomez',
            'genero_id' => 1,
            'departamento_id' => 1,
            'municipio_id' => 1,
        ]);
        DB::table('paciente')->insert([
            'tipo_documento_id' => $tiposDocumento->random(),
            'numero_documento' => '2345678901',
            'nombre1' => 'Maria',
            'nombre2' => 'Luisa',
            'apellido1' => 'Rodriguez',
            'apellido2' => 'Lopez',
            'genero_id' => 2,
            'departamento_id' => 2,
            'municipio_id' => 2,
        ]);
        DB::table('paciente')->insert([
            'tipo_documento_id' => $tiposDocumento->random(),
            'numero_documento' => '10003123121',
            'nombre1' => 'Pedro',
            'nombre2' => 'Jose',
            'apellido1' => 'Martinez',
            'apellido2' => 'Diaz',
            'genero_id' => 1,
            'departamento_id' => 3,
            'municipio_id' => 3,
        ]);
        DB::table('paciente')->insert([
            'tipo_documento_id' => $tiposDocumento->random(),
            'numero_documento' => '1000231312',
            'nombre1' => 'Luis',
            'nombre2' => 'Miguel',
            'apellido1' => 'Ramirez',
            'apellido2' => 'Torres',
            'genero_id' => 1,
            'departamento_id' => 5,
            'municipio_id' => 5,
        ]);
        DB::table('paciente')->insert([
            'tipo_documento_id' => $tiposDocumento->random(),
            'numero_documento' => '100023515631',
            'nombre1' => 'Ana',
            'nombre2' => 'Maria',
            'apellido1' => 'Gonzalez',
            'apellido2' => 'Fernandez',
            'genero_id' => 2,
            'departamento_id' => 4,
            'municipio_id' => 4,
        ]);

    }
}
