<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario_v3 extends Model
{
  protected $table = 'cuestionario_v2';
  protected $primaryKey = 'cuestionario_id';
  protected $fillable = ['cuestionario_id','usuario_id','retro_id','fecha_creacion'];
  public $timestamps = false;
  
  public function Usuario()
  {
    return $this->belongsTo('App\Usuario_v3');
  }
  public function Retroalimentacion()
  {
    return $this->belongsTo('App\Retroalimentacion_v3');
  }
  public function Cuestionario_Pregunta()
  {
  	return $this->hasMany('App\Cuestionario_Pregunta_v3','cuestionario_id');
  }
}