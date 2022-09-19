<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formulario_respuesta extends Model
{
  protected $table = 'formulario_respuesta';
  protected $primaryKey = 'respuesta_id';
  protected $fillable = ['pregunta_id','respuesta','respuesta_valor'];
  public $timestamps = false;
  
  public function Respuesta()
  {
  	return $this->hasMany('App\formulario_pregunta_respuesta','respuesta_id');
  }
  public function Pregunta()
  {
  	return $this->belongsTo('App\formulario_pregunta');
  }
}