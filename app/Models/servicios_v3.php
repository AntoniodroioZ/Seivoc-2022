<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicios_v3 extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id_servicios';
    protected $fillable = ['titulo','texto','imagen','servicioscol'];
    public $timestamps = false;
}
