<?php

namespace App\Http\Controllers;

use App\Models\movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class MovieController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movie = movie::where('estado', 1)->get();
        return response()->json($movie, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'poster_path' => 'required',
            'overview' => 'required',
            'release_date' => 'required',
            'original_title' => 'required',
            'original_language' => 'required',
        ]);

        $movie = movie::create([
            'poster_path' => $validateData['poster_path'],
            'overview' => $validateData['overview'],
            'release_date' => $validateData['release_date'],
            'original_title' => $validateData['original_title'],
            'original_language' => $validateData['original_language'],
            'estado' => 1
        ]);

        return response()->json(['message' => 'Peliculas registrada.'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie=movie::find($id);
        if (is_null($movie)) {
            return response()->json(['message' => 'pelicula no encontrada'], 404);
        }
        $movie->estado=0;
        $movie->save();
        return response()->json(['message'=>'pelicula eliminada']);
    }
}
