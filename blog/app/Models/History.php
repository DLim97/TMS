<?php

namespace App;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    //

    public $table = 'history';

	public $fillable = [
		'hover',
		'visited',
		'search'
	];

	protected $casts = [
		'hover' => 'array',
		'visited' => 'array',
		'search' => 'array'
	];

}
