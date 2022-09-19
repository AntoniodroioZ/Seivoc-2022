<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formularios extends Model
{
  protected $table = 'formularios';
  protected $primaryKey = 'formularios_id';
  protected $fillable = ['nombre_formularios'];
  public $timestamps = false;
  
  
}