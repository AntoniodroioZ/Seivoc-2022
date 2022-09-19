<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recursos_familia extends Model
{
    use HasFactory;

    protected $table = 'recursos_familia';
  	protected $fillable = ['pregunta_id', 'url_video', 'url_audio', 'url_imagen'];
  	public $timestamps = false;
}
