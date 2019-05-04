<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class RoomType
 * @package App\Models
 * @version April 28, 2019, 8:11 am UTC
 *
 * @property string RoomType_Name
 * @property integer Hotel_ID
 * @property float Price
 * @property string Description
 * @property string RoomType_IMG
 * @property integer NBeds
 * @property string Bed_Size
 */
class RoomType extends Model
{
    use SoftDeletes;

    public $table = 'room_types';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'RoomType_Name',
        'Hotel_ID',
        'Price',
        'Description',
        'RoomType_IMG',
        'NBeds',
        'Bed_Size'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'RoomType_Name' => 'string',
        'Hotel_ID' => 'integer',
        'Price' => 'float',
        'Description' => 'string',
        'RoomType_IMG' => 'string',
        'NBeds' => 'integer',
        'Bed_Size' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'RoomType_Name' => 'required',
        'Hotel_ID' => 'required',
        'Price' => 'required',
        'Description' => 'required',
        'RoomType_IMG' => 'required',
        'NBeds' => 'required',
        'Bed_Size' => 'required'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'Hotel_ID');
    }

    
}
