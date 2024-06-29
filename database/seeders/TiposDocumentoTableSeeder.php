<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_documento')->insert([
            ['nombre' => 'Cédula de Ciudadanía'],
            ['nombre' => 'Pasaporte'],
        ]);
    }
}
