<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta_familia extends Model
{
    use HasFactory;

    protected $table = 'respuesta_familia';
  	protected $primaryKey = 'respuesta_id';
  	protected $fillable = ['descripcion', 'verdadero'];
  	public $timestamps = false;
}
