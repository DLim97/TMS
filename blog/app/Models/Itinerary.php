<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Itinerary
 * @package App\Models
 * @version April 28, 2019, 8:24 am UTC
 *
 * @property integer Order_ID
 * @property string Description
 */
class Itinerary extends Model
{
    use SoftDeletes;

    public $table = 'itineraries';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Order_ID',
        'Description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Order_ID' => 'integer',
        'Description' => 'array'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Order_ID' => 'required',
        'Description' => 'required'
    ];

    
}
