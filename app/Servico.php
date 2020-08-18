<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = [
        'nome_servico',
        'status'
    ];

    //public $timestamps = false;
}
