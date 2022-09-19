<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plantel_v3 extends Model
{
  protected $table = 'plantel_v2';
  protected $primaryKey = 'plantel_id';
  protected $fillable = ['descripcion','escuela_id'];
  public $timestamps = false;

  public function Escuela()
  {
    return $this->belongsTo('App\Escuela_v3');
  }
  public function Alumno_Orientador()
  {
    return $this->hasMany('App\Alumno_Orientador_v3','plantel_id');
  }
}