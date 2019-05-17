<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version April 28, 2019, 8:23 am UTC
 *
 * @property integer User_ID
 * @property integer Travel_ID
 * @property integer RoomType_ID
 * @property date Start_date
 * @property date End_date
 * @property float Price
 */
class Order extends Model
{
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];

    // protected $softCascade = ['places'];


    public $fillable = [
        'User_ID',
        'Travel_ID',
        'RoomType_ID',
        'Start_date',
        'End_date',
        'Price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'User_ID' => 'integer',
        'Travel_ID' => 'integer',
        'RoomType_ID' => 'integer',
        'Start_date' => 'date',
        'End_date' => 'date',
        'Price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'User_ID' => 'required',
        'RoomType_ID' => 'required',
        'Start_date' => 'required',
        'End_date' => 'required',
        'Price' => 'required'
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class, 'Travel_ID');
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'RoomType_ID');
    }

    
}
