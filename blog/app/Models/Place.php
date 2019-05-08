<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Place
 * @package App\Models
 * @version April 28, 2019, 7:52 am UTC
 *
 * @property string Place_Name
 * @property integer Country_ID
 * @property string Description
 */
class Place extends Model
{
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    public $table = 'places';
    
    protected $softCascade = ['hotels','activities'];

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Place_Name',
        'Country_ID',
        'Description',
        'Place_IMG'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Place_Name' => 'string',
        'Country_ID' => 'integer',
        'Description' => 'string',
        'Place_IMG' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Place_Name' => 'required',
        'Country_ID' => 'required',
        'Description' => 'required',
        'Place_IMG' => 'required'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'Country_ID');
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    
}
