<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Situacion_v3 extends Model
{
  protected $table = 'situacion_v2';
  protected $primaryKey = 'situacion_id';
  protected $fillable = ['descripcion'];
  public $timestamps = false;
  
  public function Alumno_Orientador()
  {
  	return $this->hasMany('App\Alumno_Orientador_v3','situacion_id');
  }
  public function Modalidades()
  {
  	return $this->hasMany('App\Modalidad_v3','situacion_id');
  }
}