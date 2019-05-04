<?php

namespace App\Repositories;

use App\Models\Place;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PlaceRepository
 * @package App\Repositories
 * @version April 28, 2019, 7:52 am UTC
 *
 * @method Place findWithoutFail($id, $columns = ['*'])
 * @method Place find($id, $columns = ['*'])
 * @method Place first($columns = ['*'])
*/
class PlaceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Place_Name',
        'Country_ID',
        'Description',
        'Place_IMG'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Place::class;
    }
}
