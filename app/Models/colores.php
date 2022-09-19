<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colores extends Model
{
    use HasFactory;

    protected $table = 'colores';
    protected $primaryKey = 'id_colores';
    protected $fillable = ['color','descripcion'];

    public function convocatoriaT()
    {
        return $this->hasOne('App\convocatorias_tabla','id_colores');
    }
    public function convocatoriaEsc()
    {
        return $this->hasOne('App\convocatoria_escuela','id_colores');
    }
}
