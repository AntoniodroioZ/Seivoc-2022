<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespuestaE_v3 extends Model
{
  protected $table = 'respuestae_v2';
  protected $primaryKey = 'respuestaE_id';
  protected $fillable = ['descripcion','preguntaE_id'];
  public $timestamps = false;

  public function Pregunta()
  {
    return $this->belongsTo('App\PreguntaE_v3');
  }
  public function Preguntas_Evaluacion()
  {
    return $this->hasMany('App\Preguntas_Evaluacion_v3','respuestaE_id');
  }
}