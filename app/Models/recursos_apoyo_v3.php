<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recursos_apoyo_v3 extends Model
{
    use HasFactory;
    
    protected $table = 'recursos_apoyo';
    protected $primaryKey = 'id_recursos_apoyo';
    protected $fillable = ['titulo','texto','imagen'];
    public $timestamps = false;
}
