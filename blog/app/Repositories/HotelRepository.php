<?php

namespace App\Repositories;

use App\Models\Hotel;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HotelRepository
 * @package App\Repositories
 * @version April 28, 2019, 8:04 am UTC
 *
 * @method Hotel findWithoutFail($id, $columns = ['*'])
 * @method Hotel find($id, $columns = ['*'])
 * @method Hotel first($columns = ['*'])
*/
class HotelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Hotel_Name',
        'Hotel_IMG',
        'Place_ID',
        'Facility_ID'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Hotel::class;
    }
}
