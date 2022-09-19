<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class convocatorias extends Model
{
    use HasFactory;
    protected $table = 'convocatorias';
    protected $primaryKey = 'id_convocatorias';
    protected $fillable = ['calendario'];
    public $timestamps = false;

    public function convocatoriaTabla()
    {
        return $this->hasOne('App\convocatorias_tabla','id_convocatorias');
    }
}
