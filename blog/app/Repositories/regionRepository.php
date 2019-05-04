<?php

namespace App\Repositories;

use App\Models\region;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class regionRepository
 * @package App\Repositories
 * @version April 28, 2019, 7:44 am UTC
 *
 * @method region findWithoutFail($id, $columns = ['*'])
 * @method region find($id, $columns = ['*'])
 * @method region first($columns = ['*'])
*/
class regionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Region_Name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return region::class;
    }
}
