<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad_v3 extends Model
{
  use HasFactory;
  protected $table = 'modalidad_v2';
  protected $primaryKey = 'modalidad_id';
  protected $fillable = ['descripcion','situacion_id'];
  public $timestamps = false;

  public function Situacion()
  {
    return $this->belongsTo('App\Situacion_v3');
  }
  public function Alumno_Orientador()
  {
  	return $this->hasMany('App\Alumno_Orientador_v3','modalidad_id');
  }
}