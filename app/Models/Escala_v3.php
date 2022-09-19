<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Escala_v3 extends Model
{
  protected $table = 'Escala_v2';
  protected $primaryKey = 'escala_id';
  protected $fillable = ['nombre'];
  public $timestamps = false;
  
 
  public function Porcentaje_Grupo_Escalas()
  {
  	return $this->hasMany('App\Porcentaje_Grupo_Escalas_v3','escala_id');
  }
   public function Grupo_Escala_Pregunta()
  {
    return $this->hasMany('App\Grupo_Escala_Pregunta_v3','escala_id');
  }
}