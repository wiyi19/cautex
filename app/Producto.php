<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
	use SoftDeletes;

	public function familia()
	{
	    return $this->belongsTo('App\Familia', 'idfamilia', 'id')->withDefault(function ($item) {
	        $item->texto1 = 'N/A';
	    });
	}
    //
}
