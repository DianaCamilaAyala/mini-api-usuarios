<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Esto permite que podamos guardar datos masivamente en estos campos
    protected $fillable = [
        'nombre',
        'email',
        'puesto',
    ];
}