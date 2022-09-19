<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carreras extends Model
{
    use HasFactory;

    protected $table = 'carreras';
    protected $primaryKey = 'carreras_id';
    protected $fillable = ['numero_carrera','nombre_carrera','descripcion','nueva_carrera'];
    public $timestamps = false;

    public function datos_carreras()
    {
  	    return $this->hasMany('App\datos_carreras','carreras_id');
    }
   
}
