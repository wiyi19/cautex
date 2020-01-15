<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rubrost extends Model
{
	use SoftDeletes;
    public $table = "rubrost";
}
