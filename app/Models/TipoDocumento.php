<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    protected $table = 'tipos_documento';

    use HasFactory;
    protected $fillable = ['nombre'];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
}
