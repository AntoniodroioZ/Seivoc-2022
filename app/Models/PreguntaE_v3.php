<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreguntaE_v3 extends Model
{
  protected $table = 'preguntae_v2';
  protected $primaryKey = 'preguntaE_id';
  protected $fillable = ['descripcion'];
  public $timestamps = false;

  public function Respuesta()
  {
  	return $this->hasMany('App\RespuestaE_v3','preguntaE_id');
  }
  public function Preguntas_Complemento()
  {
    return $this->hasMany('App\Preguntas_Evaluacion_v3','preguntaE_id');
  }
  
}