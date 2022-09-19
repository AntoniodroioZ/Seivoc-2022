<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class select_familia extends Model
{
    use HasFactory;

    protected $table = 'select_familia';
  	protected $fillable = ['pregunta_id', 'select_id', 'respuesta_id'];
  	public $timestamps = false;
}
