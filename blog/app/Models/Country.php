<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;



/**
 * Class Country
 * @package App\Models
 * @version April 28, 2019, 7:50 am UTC
 *
 * @property string Country_Name
 * @property string Country_IMG
 * @property integer Region_ID
 */
class Country extends Model
{
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    public $table = 'countries';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Country_Name',
        'Country_IMG',
        'Region_ID'
    ];

    protected $softCascade = ['places'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Country_Name' => 'string',
        'Country_IMG' => 'string',
        'Region_ID' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Country_Name' => 'required',
        'Region_ID' => 'required'
    ];


    public function regions()
    {
        return $this->belongsTo(region::class, 'Region_ID');
    }

    public function places()
    {
        return $this->hasMany(Place::class);
    }
    
}
