<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conferencias_v3 extends Model
{
    use HasFactory;
    
    protected $table = 'conferencias';
    protected $primaryKey = 'id_conferencias';
    protected $fillable = ['conferenciascol'];

    
    public function conferencias()
    {
        return $this->hasOne('App\titulo_conferencias','id_conferencias');
    }
}
