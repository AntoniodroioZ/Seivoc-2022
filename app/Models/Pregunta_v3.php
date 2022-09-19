<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pregunta_v3 extends Model
{
  protected $table = 'pregunta_v2';
  protected $primaryKey = 'pregunta_id';
  protected $fillable = ['descripcion'];
  public $timestamps = false;
  
 
  public function Cuestionario_Pregunta()
  {
  	return $this->hasMany('App\Cuestionario_Pregunta_v3','pregunta_id');
  }
  public function Grupo_Escala_Pregunta()
  {
  	return $this->hasMany('App\Grupo_Escala_Pregunta_v3','pregunta_id');
  }
}