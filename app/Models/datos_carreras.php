<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datos_carreras extends Model
{
    use HasFactory;
    
    protected $table = 'datos_carreras';
    protected $primaryKey = 'datos_carreras_id';
    protected $fillable = ['carreras_id','sede_id','area_id','modalidades_id','tipo_ingreso_id','demanda','promedio','aciertos'];
    public $timestamps = false;
    
    public function areas()
    {
        return $this->belongsTo('App\areas','area_id');
    }
    public function carreras()
    {
        return $this->belongsTo('App\carreras','carreras_id');
    }
    public function modalidades_carreras()
    {
        return $this->belongsTo('App\modalidades_carreras','modalidades_id');
    }
    public function sede()
    {
        return $this->belongsTo('App\sede','sede_id');
    }
    public function tipo_ingreso()
    {
        return $this->belongsTo('App\tipo_ingreso','tipo_ingreso_id');
    }
}
