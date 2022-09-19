<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convocatorias_tabla extends Model
{
    use HasFactory;
    protected $table = 'convocatorias_tabla';
    protected $fillable = ['id_convocatorias','id_colores','siglas','nombre','convocatoria','enlace'];
    public $timestamps = false;

    public function convocatoria()
    {
        return $this->belongsTo('App\convocatorias','id_infografias');
    }
    public function color()
    {
        return $this->belongsTo('App\colores','id_colores');
    }
}