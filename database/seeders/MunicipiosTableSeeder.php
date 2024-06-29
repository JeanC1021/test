<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->insert([
            ['departamento_id' => 1, 'nombre' => 'Ibague '],
            ['departamento_id' => 1, 'nombre' => 'Robira'],
            ['departamento_id' => 2, 'nombre' => 'Armenia'],
            ['departamento_id' => 2, 'nombre' => 'Salento'],
            ['departamento_id' => 3, 'nombre' => 'Medellin'],
            ['departamento_id' => 3, 'nombre' => 'Itagui'],
            ['departamento_id' => 4, 'nombre' => 'Leticia'],
            ['departamento_id' => 4, 'nombre' => 'La victoria'],
            ['departamento_id' => 5, 'nombre' => 'Manizales'],
            ['departamento_id' => 5, 'nombre' => 'Neira'],
        ]);
    }
}
