<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metainfo extends Model
{
    use HasFactory;
    protected $table = 'metainfo';
  	protected $fillable = ['area','numero_usuarios'];
  	public $timestamps = false;
}