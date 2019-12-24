<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubros extends Model
{
    public $table = "rubros";
	protected $fillable = [
        'orden',
        'texto1',
        'imagen',
	];
	protected $casts = [
	];
}
