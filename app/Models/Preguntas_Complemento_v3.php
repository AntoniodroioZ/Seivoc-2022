<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preguntas_Complemento_v3 extends Model
{
  protected $table = 'preguntas_complemento_v2';
  protected $fillable = ['usuario_id','respuestaC_id','preguntaC_id'];
  public $timestamps = false;

  public function Usuario()
  {
    return $this->belongsTo('App\Alumno_Orientador_v3');
  }
  public function Pregunta()
  {
    return $this->belongsTo('App\PreguntaC_v3');
  }
  public function Respuesta()
  {
    return $this->belongsTo('App\RespuestaC_v3');
  }
}