<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreguntaC_v3 extends Model
{
  protected $table = 'preguntac_v2';
  protected $primaryKey = 'preguntaC_id';
  protected $fillable = ['descripcion'];
  public $timestamps = false;

  public function Respuesta()
  {
  	return $this->hasMany('App\RespuestaC_v3','preguntaC_id');
  }
  public function Preguntas_Complemento()
  {
    return $this->hasMany('App\Preguntas_Complemento_v3','preguntaC_id');
  }
  
}