<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retroalimentacion_v3 extends Model
{
  protected $table = 'retroalimentacion_v2';
  protected $primaryKey = 'retro_id';
  protected $fillable = ['nombre','descripcion','tipo','expMateriales','carreras','introduccion','material_id'];
  public $timestamps = false;
  
 
  public function Material()
  {
  	return $this->belongsTo('App\Material_v3');
  }
  public function Retroalimentaciones()
  {
  	return $this->hasMany('App\Cuestionario_v3','retro_id');
  }
}