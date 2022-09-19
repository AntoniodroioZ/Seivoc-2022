<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuestionario_Pregunta_v3 extends Model
{
  protected $table = 'cuestionario_pregunta_v2';
  protected $fillable = ['cuestionario_id','pregunta_id','valor'];
  public $timestamps = false;
  
  public function Cuestionario()
  {
    return $this->belongsTo('App\User');
  }
  public function Pregunta()
  {
    return $this->belongsTo('App\Pregunta_v3');
  }
}