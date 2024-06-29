<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(TiposDocumentoTableSeeder::class);
        $this->call(GeneroTableSeeder::class);
        $this->call(PacienteTableSeeder::class);
        $this->call(productoSeeder::class);
    }
}
