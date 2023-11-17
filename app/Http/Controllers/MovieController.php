<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMoviesRequest;
use App\Http\Requests\UpdateMoviesRequest;
use Illuminate\Validation\Rules\In;
use Ramsey\Uuid\Type\Integer;

/**
 * @property Movie $movie
 */
class MovieController extends Controller
{

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listAllMovies = $this->movie->all();
        return $listAllMovies;
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
    public function store(StoreMoviesRequest $request)
    {
        $storeMovie = $this->movie->create($request->all());
        return $storeMovie;
    }

    /**
     * Display the specified resource.
     * @param Integer $id
     */
    public function show($id)
    {
        $searchMovieById = $this->movie->find($id);
        return $searchMovieById;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Integer $id
     */
    public function update(UpdateMoviesRequest $request, $id)
    {
        $updateMovieInfo = $this->movie->find($id);
        $updateMovieInfo->update($request->all());
        return $updateMovieInfo;
    }

    /**
     * Remove the specified resource from storage.
     * @param Integer $id
     */
    public function destroy($id)
    {
        $deleteMovie = $this->movie->find($id);
        $deleteMovie->delete();
        return ['message' => 'O filme foi excluido com sucesso.'];
    }
}
