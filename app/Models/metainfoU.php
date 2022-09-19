<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metainfoU extends Model
{
    use HasFactory;
    protected $table = 'metainfou';
  	protected $fillable = ['usuario_id','referencia','fecha'];
  	public $timestamps = false;
}
