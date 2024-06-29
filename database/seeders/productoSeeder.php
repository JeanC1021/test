<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $productos = [
            [
                'id_fabricante' => 'Aci',
                'id_producto' => '41001',
                'descripcion' => 'Aguja',
                'precio' => 58,
                'existencia' => 227
            ],
            [
                'id_fabricante' => 'Aci',
                'id_producto' => '41002',
                'descripcion' => 'Micropore',
                'precio' => 80,
                'existencia' => 150
            ],
            [
                'id_fabricante' => 'Aci',
                'id_producto' => '41003',
                'descripcion' => 'Gasa',
                'precio' => 112,
                'existencia' => 80
            ],
            [
                'id_fabricante' => 'Aci',
                'id_producto' => '41004',
                'descripcion' => 'Equipo Macrogoteo',
                'precio' => 110,
                'existencia' => 50
            ],
            [
                'id_fabricante' => 'Bic',
                'id_producto' => '41003',
                'descripcion' => 'Curas',
                'precio' => 120,
                'existencia' => 20
            ],
            [
                'id_fabricante' => 'Inc',
                'id_producto' => '41089',
                'descripcion' => 'Canaleta',
                'precio' => 500,
                'existencia' => 30
            ],
            [
                'id_fabricante' => 'Qsa',
                'id_producto' => 'Xk47',
                'descripcion' => 'Compresa',
                'precio' => 150,
                'existencia' => 200
            ],
            [
                'id_fabricante' => 'Bic',
                'id_producto' => 'Xk47',
                'descripcion' => 'Compresa',
                'precio' => 200,
                'existencia' => 200
            ],
           
        ];
        Producto::insert($productos);
    }
}
