<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class titulo_conferencias extends Model
{
    use HasFactory;
    
    protected $table = 'titulo_conferencias';
    protected $primaryKey = 'id_conferencias';
    protected $fillable = ['titulo','texto','enlace'];

    
    public function conferencias()
    {
        return $this->belongsTo('App\conferencias','id_conferencias');
    }
}
