<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Activity
 * @package App\Models
 * @version April 28, 2019, 7:56 am UTC
 *
 * @property string Activity_Name
 * @property float Price
 * @property string Description
 * @property integer Place_ID
 */
class Activity extends Model
{
    use SoftDeletes;

    public $table = 'activities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Activity_Name',
        'Price',
        'Description',
        'Place_ID'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Activity_Name' => 'string',
        'Price' => 'float',
        'Description' => 'string',
        'Place_ID' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Activity_Name' => 'required',
        'Price' => 'required',
        'Description' => 'required',
        'Place_ID' => 'required'
    ];

    public function place()
    {
        return $this->belongsTo(Place::class, 'Place_ID');
    }

    
}
