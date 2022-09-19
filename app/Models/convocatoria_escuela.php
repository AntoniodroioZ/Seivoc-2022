<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convocatoria_escuela extends Model
{
    use HasFactory;
    protected $table = 'convocatoria_escuela';
    protected $fillable = ['id_escuela','id_mes_convocatoria','id_colores'];
    
    public function colorT()
    {
        return $this->belongsTo('App\colores','id_colores');
    }
    public function mesT()
    {
        return $this->belongsTo('App\mes_convocatoria','id_mes_convocatoria');
    }
    public function escuelaT()
    {
        return $this->belongsTo('App\escuelas','id_escuela');
    }
}
