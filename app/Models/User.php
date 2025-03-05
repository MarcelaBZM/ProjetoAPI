<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nome',
        'dataNascimento',
        'email',
        'cpf',
        'fone',
        'endereco'
    ];
    
    protected $casts = [
        'endereco' => 'array'
    ];
}