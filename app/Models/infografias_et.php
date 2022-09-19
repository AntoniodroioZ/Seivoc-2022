<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infografias_et extends Model
{
    use HasFactory;

    protected $table = 'infografias_et';
    protected $primaryKey = 'id_infografias';
    protected $fillable = ['eje_tematico']; 
    public $timestamps = false;

    public function tema()
    {
        return $this->hasOne('App\tema_i','id_infografias');
    }

}

