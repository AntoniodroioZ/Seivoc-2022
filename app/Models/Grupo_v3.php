<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo_v3 extends Model
{
  protected $table = 'Grupo_v2';
  protected $primaryKey = 'grupo_id';
  protected $fillable = ['nombre'];
  public $timestamps = false;
  
 
  public function Porcentaje_Grupo_Escalas()
  {
  	return $this->hasMany('App\Porcentaje_Grupo_Escalas_v3','grupo_id');
  }
  public function Mapeo_Escalas_Grupo()
  {
  	return $this->hasOne('App\Mapeo_Escalas_Grupo_v3','grupo_id');
  }
   public function Grupo_Escala_Pregunta()
  {
    return $this->hasMany('App\Grupo_Escala_Pregunta_v3','grupo_id');
  }
}