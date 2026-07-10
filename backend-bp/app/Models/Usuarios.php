<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'e-mail',
        'cpf',
        'estado',
        'data_nascimento'

    ]
}
