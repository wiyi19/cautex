<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soluciones extends Model
{
    public $table = "soluciones";
	protected $fillable = [
        'orden',
        'texto1',
        'texto2',
        'imagen',
	];
	protected $casts = [
	];
}
