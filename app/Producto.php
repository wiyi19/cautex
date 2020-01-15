<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
	use SoftDeletes;

    public $table = "productos";
	protected $fillable = [
        'orden',
        'texto1',
        'texto2',
        'imagen',
        'imagenes',
        'medidas',
        'familia_id',
	];
	protected $casts = [
		'imagenes' => 'array',
		'medidas'  => 'array',
	];

	public function familia()
	{
	    return $this->belongsTo('App\Familia', 'familia_id', 'id')->withDefault(function ($item) {
	        $item->texto1 = 'N/A';
	    });
	}
    //
}
