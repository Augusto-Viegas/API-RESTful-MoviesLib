<?php
namespace App\Repositories;

use App\Http\Resources\MovieResource;
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

    public function store($request)
    {
        DB::transaction(function () use ($request){
            //Dados a serem salvos
            $data = [
                'user_id' => $request->user_id,
                'name' => $request->name,
                'age_restriction' => $request->age_restriction,
                'duration' => $request->duration,
                'file' => $request->file,
                'file_size' => $request->file_size,
            ];
            $movie = $this->model->create($data);

            //Tag a ser adicionada caso haja
            if($request->has('tag')){
                $arrayTags = (array)$request->tag;
                $tags = explode(',',$arrayTags[0]);
                $movie->tags()->sync($tags);
            }
        });

    }

    public function getAll()
    {
        return $this->model->all();
    }
}
