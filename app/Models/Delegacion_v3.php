<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Delegacion_v3 extends Model
{
  protected $table = 'delegacion_v2';
  protected $primaryKey = 'delegacion_id';
  protected $fillable = ['descripcion','estado_id'];
  public $timestamps = false;

  public function Estado()
  {
    return $this->belongsTo('App\Estado_v3');
  }
  public function Alumno_Orientador()
  {
  	return $this->hasMany('App\Alumno_Orientador_v3','delegacion_id');
  }
  
}