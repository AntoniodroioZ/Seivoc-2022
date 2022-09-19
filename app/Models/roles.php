<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'indice';
    protected $fillable = ['usuario_id','roles_id'];

    public function convocatoriaT()
    {
        return $this->hasOne('App\User','id_usuario');
    }
    public function convocatoriaEsc()
    {
        return $this->hasOne('App\User','id_usuario');
    }
}
