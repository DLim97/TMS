<?php

namespace App\Models;

use Eloquent as Model;

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
