<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tema_i_v3 extends Model
{
    use HasFactory;

    protected $table = 'tema_i';
    protected $primaryKey = 'id_tema_i';
    protected $fillable = ['id_infografias','titulo','imagen','texto'];
    public $timestamps = false;

    public function infografiasET()
    {
        return $this->belongsTo('App\infografias_et_v3','id_infografias');
    }
}
