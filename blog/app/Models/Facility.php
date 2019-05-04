<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Facility
 * @package App\Models
 * @version April 28, 2019, 6:01 pm UTC
 *
 * @property string Facility_Name
 * @property string Facility_IMG
 */
class Facility extends Model
{
    use SoftDeletes;

    public $table = 'facilities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Facility_Name',
        'Facility_IMG'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Facility_Name' => 'string',
        'Facility_IMG' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Facility_Name' => 'required',
        'Facility_IMG' => 'required'
    ];

    
}
