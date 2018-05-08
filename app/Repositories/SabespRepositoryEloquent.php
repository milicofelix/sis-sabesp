<?php

namespace MILICO\Repositories;

use MILICO\Models\Sabesp;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;


/**
 * Class SabespRepositoryEloquent
 * @package namespace PhpLaravel\Repositories;
 */
class SabespRepositoryEloquent extends BaseRepository implements SabespRepository
{

//    public function pluck(){
//
//        $this->model->pluck('cat_nome','cat_id');
//    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Sabesp::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
