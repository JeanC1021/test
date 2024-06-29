<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function showAll()
    {
        $producto = DB::select('SELECT *, 
                                       precio * 1.1 as precio_iva 
                                FROM productos');
        $totalPrecio = DB::select(' SELECT SUM(precio) as total, 
                                           SUM(existencia) as totalExistencias, 
                                           SUM(precio * 1.1) as total_iva 
                                    FROM productos');

        $fabricante = DB::select('SELECT id_fabricante, 
                                         AVG(precio) as promedio 
                                  FROM productos 
                                  GROUP BY id_fabricante');

        return view('producto', [
            "producto" => $producto,
            'totalPrecio' => $totalPrecio[0]->total,
            'totalExistencias' => $totalPrecio[0]->totalExistencias,
            'total_iva' => $totalPrecio[0]->total_iva,
            'fabricante' => $fabricante,
        ]);
    }

    public function getMayor()
    {
        $mayor = DB::select('SELECT *, precio * 1.1 as precio_iva FROM productos ORDER BY precio DESC;');
        return view('mayorPrecio', [
            "mayor" => $mayor
        ]);
    }

}
