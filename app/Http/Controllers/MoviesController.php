<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    // public function index()
    // {
    //     // Search for a user based on their name.
    
    //     return Movie::all();
    // }
    public function index(Request $request,Movie $movie)
    {
        // Search for a user based on their name.
        $take = 10;
        $skip = 5;
        $movies = Movie::search(Movie::query(), $request->input('title'))->take(10)->skip($skip)->orderBy('id','desc')->get();
        return $movies;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    $this->validate($request,
        [
            'title' => 'required|unique:movies,title',
            'director' => 'required',
            'imageUrl' => 'required|url',
            'duration' => 'required|min:1|max:5000',
            'releaseDate' => 'required|unique:movies,releaseDate'
        ]);
        \Log::info(print_r($request->all(),true));
        return Movie::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Movie::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $this->validate($request,
        [
            'title' => 'required|unique:movies,title',
            'director' => 'required',
            'imageUrl' => 'required|url',
            'duration' => 'required|min:1|max:5000',
            'releaseDate' => 'required|unique:movies,releaseDate'
        ]);
        $movie->update($request->all());
        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        return Movie::destroy($id);
    }
}
