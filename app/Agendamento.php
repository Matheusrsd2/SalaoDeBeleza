<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'nome_cliente',
        'data',
        'hora',
        'status'
    ];

    //public $timestamps = false;
}
