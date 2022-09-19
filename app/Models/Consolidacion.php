<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consolidacion extends Model
{
    use HasFactory;

    protected $table = 'consolidacion';
    protected $fillable = ['pregunta_id', 'respuesta_id', 'modulo_id'];
    public $timestamps = false;

}
