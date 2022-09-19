<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta_familia extends Model
{
    use HasFactory;

    protected $table = 'pregunta_familia';
  	protected $primaryKey = 'pregunta_id';
  	protected $fillable = ['descripcion'];
  	public $timestamps = false;
}
