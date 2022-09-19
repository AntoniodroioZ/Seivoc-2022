<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Escuela_v3 extends Model
{
  protected $table = 'escuela_v2';
  protected $primaryKey = 'escuela_id';
  protected $fillable = ['descripcion','grado_id','modalidad_id','tipo'];
  public $timestamps = false;

  public function Grado()
  {
    return $this->belongsTo('App\Grado_v3');
  }

  public function Alumno_Orientador()
  {
  	return $this->hasMany('App\Alumno_Orientador_v3','escuela_id');
  }
  public function Planteles()
  {
  	return $this->hasMany('App\Plantel_v3','escuela_id');
  }
}