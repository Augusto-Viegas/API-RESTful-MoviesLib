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
    public function index(StoreMoviesRequest $request)
    {
        //TODO refatorar para que possa ser incluido filtros e atributos na pesquisa
        if($request->has('tags')){
            $tagAttribute = "tags:id," . implode(',', $request->tags);
            $this->movieRepository->selectAttributesRelatedRegisters($tagAttribute);
        }else {
            $this->movieRepository->selectAttributesRelatedRegisters('tags');
        }

        if($request->has('filter')){
            $this->movieRepository->searchFilter($request->filter);
        }

        if($request->has('attributes')){
            $this->movieRepository->selectAttributes($request->attributes);
        }

        return $this->movieRepository->getResults();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMoviesRequest $request)
    {
        $this->movieRepository->store($request);
        return (new MovieResource($request))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     * @param Integer $id
     */
    public function show($id)
    {
        //TODO refatorar para que possa ser incluido filtros e atributos na pesquisa
        $searchMovieById = $this->movie->find($id);
        return $searchMovieById;
    }

    /**
     * Update the specified resource in storage.
     * @param Integer $id
     */
    public function update(UpdateMoviesRequest $request, $id)
    {
        //TODO Refatorar o método de update para que PATCH seja diferenciado de PUT
        $updateMovieInfo = $this->movie->find($id);
        $updateMovieInfo->update($request->all());
        return $updateMovieInfo;
    }

    /**
     * Remove the specified resource from storage.
     * @param Integer $id
     */
    public function destroy($id): array
    {
        $deleteMovie = $this->movie->find($id);
        $deleteMovie->delete();
        return ['message' => 'O filme foi excluido com sucesso.'];
    }
}
