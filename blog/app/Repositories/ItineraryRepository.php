<?php

namespace App\Repositories;

use App\Models\Itinerary;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ItineraryRepository
 * @package App\Repositories
 * @version April 28, 2019, 8:24 am UTC
 *
 * @method Itinerary findWithoutFail($id, $columns = ['*'])
 * @method Itinerary find($id, $columns = ['*'])
 * @method Itinerary first($columns = ['*'])
*/
class ItineraryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Order_ID',
        'Description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Itinerary::class;
    }
}
