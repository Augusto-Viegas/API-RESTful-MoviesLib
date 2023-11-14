<?php

namespace App\Http\Controllers;

use App\Models\MovieTag;
use App\Http\Requests\StoreMovieTagRequest;
use App\Http\Requests\UpdateMovieTagRequest;


/**
 * @property  MovieTag $movieTags
 */
class MovieTagController extends Controller
{

    public function __construct(MovieTag $tags)
    {
        $this->movieTags = $tags;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listAllMovieTags = $this->movieTags->all();
        return $listAllMovieTags;
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
    public function store(StoreMovieTagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MovieTag $movieTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MovieTag $movieTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieTagRequest $request, MovieTag $movieTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovieTag $movieTag)
    {
        //
    }
}
