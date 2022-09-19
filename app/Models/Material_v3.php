<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material_v3 extends Model
{
  protected $table = 'material_v2';
  protected $primaryKey = 'material_id';
  protected $fillable = ['nombre','urlVideo','urlImagen','urlPdf'];
  public $timestamps = false;
  
 
  public function Retroalimentaciones()
  {
  	return $this->hasMany('App\Retroalimentacion_v3','material_id');
  }
}