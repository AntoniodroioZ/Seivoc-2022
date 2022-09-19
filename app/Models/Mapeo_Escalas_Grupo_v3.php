<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapeo_Escalas_Grupo_v3 extends Model
{
  protected $table = 'mapeo_escalas_grupo_v2';
  protected $fillable = ['grupo_id','SS','EP','V','AP','MS','OG','CT','CL','MC','AL'];
  public $timestamps = false;

  
  public function Grupo()
  {
    return $this->belongsTo('App\Grupo_v3');
  }
}