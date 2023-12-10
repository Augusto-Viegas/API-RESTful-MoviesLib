<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

abstract class AbstractRepository
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function queryBuilder(array $allowedIncludes = null,
                                   array $allowedFilters = null,
                                   array $allowedSorts = null)
    {
        $model = $this->model;
        $query = QueryBuilder::for($model::class);

        if($allowedIncludes != null){
            $query->allowedIncludes($allowedIncludes);
        }

        if($allowedFilters != null){
            $query->allowedFilters($allowedFilters);
        }

        if($allowedSorts != null){
            $query->allowedSorts($allowedSorts);
        }

        return  $query->get();
    }

    public function findResourceById($id)
    {
        return $this->model->find($id);
    }
}
