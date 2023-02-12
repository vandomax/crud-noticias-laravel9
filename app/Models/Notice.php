<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    
        // ocultar as colunas na hora da consulta.
        protected $hidden = [ 
        'id',
        'created_at',
        'updated_at',
    ];
}
