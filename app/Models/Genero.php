<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Genero extends Model
{

    protected $table = 'genero';
    use HasFactory;

    protected $fillable = ['nombre'];

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }   
}