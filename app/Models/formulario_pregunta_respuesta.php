<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formulario_pregunta_respuesta extends Model
{
  protected $table = 'formulario_pregunta_respuesta';
  protected $fillable = ['usuario_id','respuesta_id','pregunta_id'];
  public $timestamps = false;
  
  public function Respuesta()
  {
  	return $this->belongsTo('App\formulario_respuesta');
  }
  public function Pregunta()
  {
  	return $this->belongsTo('App\formulario_pregunta');
  }
  public function Usuario()
  {
  	return $this->belongsTo('App\User');
  }
}