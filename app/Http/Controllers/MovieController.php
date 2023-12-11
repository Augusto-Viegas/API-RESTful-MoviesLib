<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieResource;
use App\Http\Requests\StoreMoviesRequest;
use App\Http\Requests\UpdateMoviesRequest;
use Ramsey\Uuid\Type\Integer;
use App\Repositories\MovieRepository;


class MovieController extends Controller
{
    protected MovieRepository $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $getAllResources = $this->movieRepository->
        queryBuilder(['tags','users'],
            ['name','age_restriction'],
            ['name','duration','age_restriction','file_size'],
        );
        return MovieResource::collection($getAllResources);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMoviesRequest $request): MovieResource
    {
        //? Armazenamento do arquivo
        $file = $request->file('file');
        $fileUrn = $file->store('file', 'public');

        //? Verificar o tamanho do arquivo em bytes
        $fileSize = $request->file('file')->getSize();

        //? verifica a duração do video
        $fileDuration = $this->movieRepository->getVideoDuration($file);

        //? Adiciona o tamanho e o caminho do arquivo aos dados validados
        $validatedData = $request->validated();
        $validatedData['file'] = $fileUrn;
        $validatedData['file_size'] = $fileSize;
        $validatedData['duration'] = $fileDuration;

        $data = $this->movieRepository->store($validatedData);
        return MovieResource::make($data->load(['tags']));
    }

    /**
     * Display the specified resource.
     * @param Integer $id
     */
    public function show(Integer $id): MovieResource
    {
        $resource = $this->movieRepository->findResourceById($id);
        return MovieResource::make($resource->load(['tags']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UpdateMoviesRequest $request): MovieResource
    {
        $validatedData = $request->validated();
        $resourceUpdate = $this->movieRepository->update($id, $validatedData);
        return MovieResource::make($resourceUpdate);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        return $this->movieRepository->destroy($id);
    }
}
