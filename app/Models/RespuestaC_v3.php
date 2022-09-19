<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespuestaC_v3 extends Model
{
  protected $table = 'respuestac_v2';
  protected $primaryKey = 'respuestaC_id';
  protected $fillable = ['descripcion','preguntaC_id'];
  public $timestamps = false;

  public function Pregunta()
  {
    return $this->belongsTo('App\PreguntaC_v3');
  }
  public function Preguntas_Complemento()
  {
    return $this->hasMany('App\Preguntas_Complemento_v3','respuestaC_id');
  }
}