<?php

namespace App\Repositories;

use App\Models\RoomType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RoomTypeRepository
 * @package App\Repositories
 * @version April 28, 2019, 8:11 am UTC
 *
 * @method RoomType findWithoutFail($id, $columns = ['*'])
 * @method RoomType find($id, $columns = ['*'])
 * @method RoomType first($columns = ['*'])
*/
class RoomTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'RoomType_Name',
        'Hotel_ID',
        'Price',
        'Description',
        'RoomType_IMG',
        'NBeds',
        'Bed_Size'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomType::class;
    }
}
