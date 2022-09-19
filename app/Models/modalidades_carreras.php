<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modalidades_carreras extends Model
{
    use HasFactory;

    protected $table = 'modalidades_carreras';
    protected $primaryKey = 'modalidades_carreras_id';
    protected $fillable = ['nombre_modalidad','descripcion'];
    public $timestamps = false;

    public function datos_carreras()
    {
  	    return $this->hasMany('App\datos_carreras','modalidades_carreras_id');
    }
   
}
