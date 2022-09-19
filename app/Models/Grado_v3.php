<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Grado_v3 extends Model
{
  protected $table = 'grado_v2';
  protected $primaryKey = 'grado_id';
  protected $fillable = ['descripcion'];
  public $timestamps = false;
  
 
  public function Alumno_Orientador()
  {
  	return $this->hasMany('App\Alumno_Orientador_v3','grado_id');
  }
  public function Escuelas()
  {
  	return $this->hasMany('App\Escuela_v3','grado_id');
  }
  public function Periodos_Escolares()
  {
    return $this->hasMany('App\Periodo_Escolar_v3','grado_id');
  }

}