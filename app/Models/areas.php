<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class areas extends Model
{
  protected $table = 'areas';
  protected $primaryKey = 'area_id';
  protected $fillable = ['nombre_area','descripcion'];
  public $timestamps = false;
  
 
  public function datos_carreras()
  {
  	return $this->hasMany('App\datos_carreras','area_id');
  }
   
}