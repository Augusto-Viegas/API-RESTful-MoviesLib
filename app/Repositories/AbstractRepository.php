<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function selectAttributesRelatedRegisters($attributes)
    {
        $this->model = $this->model->with($attributes);
    }

    public function searchFilter($filters)
    {
        $filters = explode(';', $filters);

        foreach($filters as $key => $condition)
        {
            $c = explode(';', $condition);
            $this->model = $this->model->where($c[0], $c[1], $c[2]);
        }
    }

    public function selectAttributes($attributes)
    {
        $this->model = $this->model->selectRaw($attributes);
    }

    public function getResults()
    {
        return $this->model->get();
    }

    public function getResultsPerPag(int $numRegPerPag)
    {
        return $this->model->paginate($numRegPerPag);
    }
}
