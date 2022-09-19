<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo_Escolar_v3 extends Model
{
  protected $table = 'periodo_escolar_v2';
  protected $primaryKey = 'periodo_escolar_id';
  protected $fillable = ['descripcion','grado_id'];
  public $timestamps = false;

  public function Grado()
  {
    return $this->belongsTo('App\Grado_v3');
  }
  public function Alumno_Orientador()
  {
  	return $this->hasMany('App\Alumno_Orientador_v3','periodo_escolar_id');
  }
  
}