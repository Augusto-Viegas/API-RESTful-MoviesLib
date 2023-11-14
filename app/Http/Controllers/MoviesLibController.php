<?php

namespace App\Http\Controllers;

use App\Models\MoviesLib;
use App\Http\Requests\StoreMoviesLibRequest;
use App\Http\Requests\UpdateMoviesLibRequest;
use Illuminate\Validation\Rules\In;
use Ramsey\Uuid\Type\Integer;

/**
 * @property MoviesLib $moviesLib
 */
class MoviesLibController extends Controller
{

    public function __construct(MoviesLib $movie)
    {
        $this->moviesLib = $movie;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listAllMovies = $this->moviesLib->all();
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
    public function store(StoreMoviesLibRequest $request)
    {
        $storeMovie = $this->moviesLib->create($request->all());
        return $storeMovie;
    }

    /**
     * Display the specified resource.
     * @param Integer $id
     */
    public function show($id)
    {
        $searchMovieById = $this->moviesLib->find($id);
        return $searchMovieById;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MoviesLib $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Integer $id
     */
    public function update(UpdateMoviesLibRequest $request, $id)
    {
        $updateMovieInfo = $this->moviesLib->find($id);
        $updateMovieInfo->update($request->all());
        return $updateMovieInfo;
    }

    /**
     * Remove the specified resource from storage.
     * @param Integer $id
     */
    public function destroy($id)
    {
        $deleteMovie = $this->moviesLib->find($id);
        $deleteMovie->delete();
        return ['message' => 'O filme foi excluido com sucesso.'];
    }
}
