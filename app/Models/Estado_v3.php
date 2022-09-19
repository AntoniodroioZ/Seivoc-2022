<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Estado_v3 extends Model
{
  protected $table = 'estado_v2';
  protected $primaryKey = 'estado_id';
  protected $fillable = ['descripcion'];
  public $timestamps = false;

  public function Delegaciones()
  {
  	return $this->hasMany('App\Delegacion_v3','estado_id');
  }
  public function Alumno_Orientador()
  {
    return $this->hasMany('App\Alumno_Orientador_v3','estado_id');
  }
  
}