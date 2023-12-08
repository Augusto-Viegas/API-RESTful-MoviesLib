<?php
namespace App\Repositories;

use App\Models\Movie;
use FFMpeg\Coordinate\TimeCode;
use FFMpeg\FFMpeg;
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

    public function getVideoDuration($videoUrn): string
    {
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($videoUrn);
        $duration = $video->getStreams()->videos()->first()->get('duration');
        return gmdate('H:i:s', $duration);
    }
}

