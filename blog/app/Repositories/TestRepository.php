<?php

namespace App\Repositories;

use App\Models\Test;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TestRepository
 * @package App\Repositories
 * @version March 15, 2019, 11:24 am UTC
 *
 * @method Test findWithoutFail($id, $columns = ['*'])
 * @method Test find($id, $columns = ['*'])
 * @method Test first($columns = ['*'])
*/
class TestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Test::class;
    }
}
