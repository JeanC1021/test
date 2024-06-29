<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Tipo_documento;
use App\Models\TipoDocumento;
use App\Models\Genero;
use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    public function index()
    {
        $paciente = DB::select(' SELECT p.id,
                                        numero_documento , 
                                        nombre1,
                                        nombre2,
                                        apellido1,
                                        apellido2,
                                        g.nombre as genero,
                                        d.nombre as departamento,
                                        m.nombre as municipio,
                                        td.nombre as tipo_docu
                                    FROM paciente p 
                                    INNER JOIN tipos_documento td ON td.id = p.tipo_documento_id
                                    INNER JOIN genero g ON g.id = p.genero_id
                                    INNER JOIN departamentos d ON d.id = p.departamento_id
                                    INNER JOIN municipios m ON m.id = p.municipio_id ');
        // return $paciente;
        // $pacientes = Paciente::all();
        $departamentos = Departamento::all();
        $genero = Genero::all();
        $tiposDocumento = TipoDocumento::all();

        return view('pacientes', [
            'pacientes' => $paciente,
            'departamentos'=> $departamentos,
            'generos' => $genero,
            'tiposDocumento' => $tiposDocumento
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required',
            'numero_documento' => 'required',
            'nombre1' => 'required',
            'nombre2' => 'required',
            'apellido1' => 'required',
            'apellido2' => 'required',
            'genero_id' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
        ]);
        if(!$request->id){
            Paciente::create($request->all());
        }
        else{
            Paciente::where('id', $request->id)
                    ->update([
                        'tipo_documento_id'=>$request->tipo_documento_id,
                        'numero_documento'=>$request->numero_documento,
                        'nombre1'=>$request->nombre1,
                        'nombre2'=>$request->nombre2,
                        'apellido1'=>$request->apellido1,
                        'apellido2'=>$request->apellido2,
                        'genero_id'=>$request->genero_id,
                        'departamento_id'=>$request->departamento_id,
                        'municipio_id'=>$request->municipio_id,
                    ]);
                }
        return redirect()->route('pacientes.index')->with('success', 'Paciente creado exitosamente.');
    }

    public function show($paciente)
    {
        $paciente = DB::select(' SELECT p.id,
                                        numero_documento , 
                                        nombre1,
                                        nombre2,
                                        apellido1,
                                        apellido2,
                                        g.nombre as genero,
                                        g.id as genero_id,
                                        d.nombre as departamento,
                                        d.id as departamento_id,
                                        m.nombre as municipio,
                                        m.id as municipio_id,
                                        td.nombre as tipo_docu,
                                        td.id as tipo_documento_id
                                    FROM paciente p 
                                    INNER JOIN tipos_documento td ON td.id = p.tipo_documento_id
                                    INNER JOIN genero g ON g.id = p.genero_id
                                    INNER JOIN departamentos d ON d.id = p.departamento_id
                                    INNER JOIN municipios m ON m.id = p.municipio_id 
                                    WHERE p.id = '. $paciente);
        return $paciente[0];
    }


    public function destroy($paciente_id)
    {
        DB::select('DELETE FROM paciente WHERE id = ' . $paciente_id);
        return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado exitosamente.');
    }

}
