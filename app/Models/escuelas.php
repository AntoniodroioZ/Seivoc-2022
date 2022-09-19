<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class escuelas extends Model
{
    use HasFactory;

    protected $table = 'escuelas';
    protected $primaryKey = 'id_escuela';
    protected $fillable = ['nombre','siglas'];

    
    public function conEscuelas()
    {
        return $this->hasMany('App\convocatoria_escuela','id_escuela');
    }
}
