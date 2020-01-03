<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Familia extends Model
{
	use SoftDeletes;
    public function productos() {
        return $this->hasMany('App\Producto', 'familia_id', 'id');
    }
}
