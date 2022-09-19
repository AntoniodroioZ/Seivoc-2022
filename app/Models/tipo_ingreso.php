<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_ingreso extends Model
{
    use HasFactory;

    protected $table = 'tipo_ingreso';
    protected $primaryKey = 'tipo_ingreso_id';
    protected $fillable = ['nombre_tipo_ingreso','descripcion'];
    public $timestamps = false;

    public function datos_carreras()
    {
  	    return $this->hasMany('App\datos_carreras','tipo_ingreso_id');
    }
   
}
