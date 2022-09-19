<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convocatoria_escuela_v3 extends Model
{
    use HasFactory;
    protected $table = 'convocatoria_escuela';
    protected $fillable = ['id_escuela','id_mes_convocatoria','id_colores'];
    
    public function colorT()
    {
        return $this->belongsTo('App\colores_v3','id_colores');
    }
    public function mesT()
    {
        return $this->belongsTo('App\mes_convocatoria_v3','id_mes_convocatoria');
    }
    public function escuelaT()
    {
        return $this->belongsTo('App\escuelas_v3','id_escuela');
    }
}
