<?php

namespace App\Http\Controllers;

use App\Models\MoviesLib;
use App\Http\Requests\StoreMoviesLibRequest;
use App\Http\Requests\UpdateMoviesLibRequest;

/**
 * @property MoviesLib $movie
 */
class MoviesLibController extends Controller
{

    public function __construct(MoviesLib $movie)
    {
        $this->movie = $movie;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MoviesLib $moviesLib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MoviesLib $moviesLib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMoviesLibRequest $request, MoviesLib $moviesLib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MoviesLib $moviesLib)
    {
        //
    }
}
