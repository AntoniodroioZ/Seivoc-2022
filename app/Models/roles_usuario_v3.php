<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles_usuario_v3 extends Model
{
    use HasFactory;
    protected $table = 'roles_usuario';
    protected $primaryKey = 'rol_id';
    protected $fillable = ['usuario_id','tipo_rol','usuario_add'];
    public $timestamps = true;
}
