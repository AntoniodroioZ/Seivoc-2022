<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sede extends Model
{
    use HasFactory;

    protected $table = 'sede';
    protected $primaryKey = 'sede_id';
    protected $fillable = ['nombre_sede','ubicacion','pagina_web','logotipo','imagen'];
    public $timestamps = false;

    public function datos_carreras()
    {
  	    return $this->hasMany('App\datos_carreras','sede_id');
    }
   
}
