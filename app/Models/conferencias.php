<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conferencias extends Model
{
    use HasFactory;
    
    protected $table = 'conferencias';
    protected $primaryKey = 'id_conferencias';
    protected $fillable = ['conferenciascol','titulo','texto','imagen'];
    public $timestamps = false;
    
    public function conferencias()
    {
        return $this->hasOne('App\titulo_conferencias','id_conferencias');
    }
}
