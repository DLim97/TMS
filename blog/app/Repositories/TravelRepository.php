<?php

namespace App\Repositories;

use App\Models\Travel;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TravelRepository
 * @package App\Repositories
 * @version April 28, 2019, 8:15 am UTC
 *
 * @method Travel findWithoutFail($id, $columns = ['*'])
 * @method Travel find($id, $columns = ['*'])
 * @method Travel first($columns = ['*'])
*/
class TravelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Travel_Name',
        'RoomType_ID',
        'Start_date',
        'End_date',
        'Price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Travel::class;
    }
}
