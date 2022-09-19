<?php

namespace App\Models;


//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno_orientador_v3 extends Model
{
    

    protected $table = 'alumno_orientador_v2';
    protected $primaryKey = 'usuario_id';
    protected $fillable = [ 'usuario_id','situacion_id','modalidad_id','grado_id','periodo_escolar_id','escuela_id','plantel_id','estado_id','delegacion_id','fecha_creacion','alumno_orientador'];
    public $timestamps = false;
    public function Usuario()
  {
    return $this->belongsTo('App\User');
  } 
  public function Situacion()
  {
  	return $this->belongsTo('App\Situacion_v3');
  }
  public function Grado()
  {
    return $this->belongsTo('App\Grado_v3');
  }
  public function Periodo_Escolar()
  {
    return $this->belongsTo('App\Periodo_Escolar_v3');
  }
  public function Escuela()
  {
    return $this->belongsTo('App\Escuela_v3');
  }
  public function Plantel()
  {
    return $this->belongsTo('App\Plantel_v3');
  }
  public function Estado()
  {
    return $this->belongsTo('App\Estado_v3');
  }
  public function Delegacion()
  {
    return $this->belongsTo('App\Delegacion_v3');
  }
  public function Preguntas_Complemento()
  {
    return $this->hasMany('App\Preguntas_Complemento_v3','usuario_id');
  }
   
}
