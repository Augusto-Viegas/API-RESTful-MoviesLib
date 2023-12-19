<?php
namespace App\Repositories;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagRepository extends AbstractRepository
{
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }

    public function store(array $data)
    {
        $result = null;
        DB::transaction(function() use ($data, &$result){
            $tag = $this->model->create($data);
            $result = $tag;
        });
        return $result;
    }

    public function update(int $id, array $data)
    {
        $updateTagInfo = $this->model->findOrFail($id);
        $updateTagInfo->update($data);
        return $updateTagInfo;
    }

    public function destroy(int $id): array
    {
        if($this->model->findOrFail($id) == null)
        {
            return ['message' => 'The ID from this resource was not found in our DB'];
        }
        $deleteMovie = $this->model->findOrFail($id);
        $deleteMovie->delete();
        return ['message' => 'Resource deleted successfully'];
    }
}
