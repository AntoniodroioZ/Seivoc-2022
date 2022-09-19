<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convocatorias_tabla_v3 extends Model
{
    use HasFactory;
    protected $table = 'convocatorias_tabla';
    protected $fillable = ['id_convocatorias','id_colores','siglas','nombre','convocatoria'];
    public $timestamps = false;

    public function convocatoria()
    {
        return $this->belongsTo('App\convocatorias_v3','id_infografias');
    }
    public function color()
    {
        return $this->belongsTo('App\colores_v3','id_colores');
    }
}