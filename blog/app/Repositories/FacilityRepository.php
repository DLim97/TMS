<?php

namespace App\Repositories;

use App\Models\Facility;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FacilityRepository
 * @package App\Repositories
 * @version April 28, 2019, 6:01 pm UTC
 *
 * @method Facility findWithoutFail($id, $columns = ['*'])
 * @method Facility find($id, $columns = ['*'])
 * @method Facility first($columns = ['*'])
*/
class FacilityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Facility_Name',
        'Facility_IMG'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Facility::class;
    }
}
