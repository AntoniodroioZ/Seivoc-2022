<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Porcentaje_Grupo_Escalas_v3 extends Model
{
  protected $table = 'porcentaje_grupo_escalas_v2';
  protected $fillable = ['porcentaje_max','porcentaje_min','grupo_id','escala_id'];
  public $timestamps = false;

  
  public function Grupo()
  {
    return $this->belongsTo('App\Grupo_v3');
  }
  public function Escala()
  {
    return $this->belongsTo('App\Escala_v3');
  }
}