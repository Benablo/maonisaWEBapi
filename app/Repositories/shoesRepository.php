<?php

namespace App\Repositories;

use App\Models\shoes;
use App\Repositories\BaseRepository;

/**
 * Class shoesRepository
 * @package App\Repositories
 * @version October 28, 2021, 2:16 am UTC
*/

class shoesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'Brand',
        'Name',
        'Prize'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return shoes::class;
    }
}
