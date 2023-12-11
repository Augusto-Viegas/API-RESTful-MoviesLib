<?php
namespace App\Repositories;

use App\Models\Movie;
use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\DB;


class MovieRepository extends AbstractRepository
{

    public function __construct(Movie $model)
    {
        parent::__construct($model);
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

    public function update(int $id, array $data){
        $updateMovieInfo = $this->model->findOrFail($id);
        $updateMovieInfo->update($data);
        return $updateMovieInfo;
    }

    public function destroy(int $id): array
    {
        if($this->model->findOrFail($id) == null)
        {
            return ['message' => 'The ID from this resource was not found in our DB'];
        }
        $deleteMovie = $this->model->find($id);
        $deleteMovie->delete();
        return ['message' => 'Resource deleted successfully'];
    }

    public function getVideoDuration($videoUrn): string
    {
        $ffmpeg = FFMpeg::create();
        $video = $ffmpeg->open($videoUrn);
        $duration = $video->getStreams()->videos()->first()->get('duration');
        return gmdate('H:i:s', $duration);
    }
}

