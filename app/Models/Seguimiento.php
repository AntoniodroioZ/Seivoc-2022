<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    use HasFactory;

    protected $table = 'seguimiento';
  	protected $primaryKey = 'usuario_id';
  	protected $fillable = ['usuario_id','puntaje', 'medalla', 'pregunta_id', 'fecha'];
  	public $timestamps = false;
}
