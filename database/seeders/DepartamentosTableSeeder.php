<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departamentos')->insert([
            ['nombre' => 'Tolima'],
            ['nombre' => 'Quindio'],
            ['nombre' => 'Antioquia'],
            ['nombre' => 'Amazonas'],
            ['nombre' => 'Caldas'],
        ]);
    }
}
