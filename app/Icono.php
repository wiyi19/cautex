<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Icono extends Model
{
	use SoftDeletes;
	public $table = "iconos";
    //
}