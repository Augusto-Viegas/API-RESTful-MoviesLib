<?php
namespace App\Repositories;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;


class MovieRepository extends AbstractRepository
{

    public function __construct(Movie $model)
    {
        parent::__construct($model);
    }

    public function getIndexResult()
    {
        //TODO Lógica do index.
    }

    public function store(array $data)
    {
        $result = null;
        DB::transaction(function () use ($data, &$result){
            $movie = $this->model->create($data);
            //Tag a ser adicionada caso haja
            if($data['tag']) {
                $tags = explode(',',$data['tag']);
                $movie->tags()->sync($tags);
            }
            $result = $movie;
        });
        return $result;
    }

    public function getAll()
    {
        return $this->model->all();
    }
}

