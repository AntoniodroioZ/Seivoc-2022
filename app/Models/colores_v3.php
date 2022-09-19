<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colores_v3 extends Model
{
    use HasFactory;

    protected $table = 'colores';
    protected $primaryKey = 'id_colores';
    protected $fillable = ['color','descripcion'];

    public function convocatoriaT()
    {
        return $this->hasOne('App\convocatorias_tabla_v3','id_colores');
    }
    public function convocatoriaEsc()
    {
        return $this->hasOne('App\convocatoria_escuela_v3','id_colores');
    }
}
