<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Grupo_Escala_Pregunta_v3 extends Model
{
  protected $table = 'grupo_escala_pregunta_v2';
  protected $fillable = ['pregunta_id','grupo_id','escala_id'];
  public $timestamps = false;

  public function Pregunta()
  {
    return $this->belongsTo('App\Pregunta_v3');
  }
  public function Grupo()
  {
    return $this->belongsTo('App\Grupo_v3');
  }
  public function Escala()
  {
    return $this->belongsTo('App\Escala_v3');
  }
}