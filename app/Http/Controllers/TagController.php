<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Repositories\TagRepository;


/**
 * @property  Tag $tags
 */
class TagController extends Controller
{

    private TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $getAllResource = $this->tagRepository->
        queryBuilder(null,['id','category'],['id','category']);
        return TagResource::collection($getAllResource);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request): TagResource
    {
        $validatedData = $request->validated();
        $data = $this->tagRepository->store($validatedData);
        return TagResource::make($data);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return TagResource
     */
    public function show(int $id): TagResource
    {
        $resource = $this->tagRepository->findResourceById($id);
        return TagResource::make($resource);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param UpdateTagRequest $request
     * @return TagResource
     */
    public function update(int $id, UpdateTagRequest $request): TagResource
    {
       $validatedData = $request->validated();
       $resourceUpdate = $this->tagRepository->update($id, $validatedData);
       return TagResource::make($resourceUpdate);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        return $this->tagRepository->destroy($id);
    }
}
