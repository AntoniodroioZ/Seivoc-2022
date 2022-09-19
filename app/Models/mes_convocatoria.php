<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mes_convocatoria extends Model
{
    use HasFactory;

    protected $table = 'mes_convocatoria';
    protected $primaryKey = 'id_mes_convocatoria';
    protected $fillable = ['mes'];

    public function conEscuela()
    {
        return $this->hasMany('App\convocatoria_escuela','id_mes_convocatoria');
    }
}
