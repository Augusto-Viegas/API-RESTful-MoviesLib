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
    public function index()
    {
        $teste = $this->tagRepository->nomeProvisorio();
        return TagResource::collection($teste);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        $storeTag = $this->tags->create($request->all());
        return $storeTag;
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $showTags = $this->tags->find($id);
        return $showTags;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $movieTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateTagRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UpdateTagRequest $request, $id)
    {
        $updateTag = $this->tags->find($id);
        $updateTag->update($request->all());
        return $updateTag;
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     */
    public function destroy($id)
    {
        $deleteTag = $this->tags->find($id);
        $deleteTag->delete();
        return $deleteTag;
    }
}
