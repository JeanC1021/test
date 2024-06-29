<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function municipioPorDepartamento($departamento_id){
        return Municipio::where(['departamento_id' => $departamento_id])->get();
    }
}
