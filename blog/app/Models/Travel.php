<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Travel
 * @package App\Models
 * @version April 28, 2019, 8:15 am UTC
 *
 * @property string Travel_Name
 * @property integer RoomType_ID
 * @property date Start_date
 * @property date End_date
 * @property float Price
 */
class Travel extends Model
{
    use SoftDeletes;

    public $table = 'travels';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'Travel_Name',
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
        'Travel_Name' => 'string',
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
        'Travel_Name' => 'required',
        'RoomType_ID' => 'required',
        'Start_date' => 'required',
        'End_date' => 'required',
        'Price' => 'required'
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'RoomType_ID');
    }

}
