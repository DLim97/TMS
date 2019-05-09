<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hotel
 * @package App\Models
 * @version April 28, 2019, 8:04 am UTC
 *
 * @property string Hotel_Name
 * @property string Hotel_IMG
 * @property integer Place_ID
 * @property string Facility_ID
 */
class Hotel extends Model
{
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    public $table = 'hotels';
    
    protected $softCascade = ['roomTypes'];

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Hotel_Name',
        'Hotel_IMG',
        'Place_ID',
        'Facility_ID'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Hotel_Name' => 'string',
        'Hotel_IMG' => 'string',
        'Place_ID' => 'integer',
        'Facility_ID' => 'array'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Hotel_Name' => 'required',
        'Place_ID' => 'required',
        'Facility_ID' => 'required'
    ];

    public function place()
    {
        return $this->belongsTo(Place::class, 'Place_ID');
    }

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
  
    public static function boot()
    {
        parent::boot();    
        static::deleted(function($product)
        {
            $product->images()->delete();
            $product->descriptions()->delete();
        });
    }

    
}
