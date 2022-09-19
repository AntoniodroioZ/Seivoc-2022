<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preguntas_Evaluacion_v3 extends Model
{
  protected $table = 'preguntas_evaluacion_v2';
  protected $fillable = ['usuario_id','respuestaE_id','preguntaE_id'];
  public $timestamps = false;

  public function Usuario()
  {
    return $this->belongsTo('App\Usuario_v3');
  }
  public function Pregunta()
  {
    return $this->belongsTo('App\PreguntaE_v3');
  }
  public function Respuesta()
  {
    return $this->belongsTo('App\RespuestaE_v3');
  }
}