<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formulario_pregunta extends Model
{
  protected $table = 'formulario_pregunta';
  protected $primaryKey = 'pregunta_id';
  protected $fillable = ['pregunta','formularios_id'];
  public $timestamps = false;
  
  public function Pregunta()
  {
  	return $this->hasMany('App\formulario_pregunta_respuesta','pregunta_id');
  }
  public function Formularios()
  {
  	return $this->belongsTo('App\formularios');
  }
}