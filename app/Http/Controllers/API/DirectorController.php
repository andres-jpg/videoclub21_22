<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function import()
    {
        $peliculas = \App\Models\Movie::all();
        foreach($peliculas as $pelicula) {
            $directorStr = $pelicula->director;

            $espacio = strpos($directorStr, ' ');
            $nombre = substr($directorStr, 0, $espacio);
            $apellidos = substr($directorStr, $espacio + 1);

            if(!$director = Director::existsDirector($nombre, $apellidos)) {
                $director = Director::create([
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                ]);
            }
            //$pelicula->director_id = $director->id;
            $pelicula->elDirector()->associate($director);
            $pelicula->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function show(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Director $director)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Director  $director
     * @return \Illuminate\Http\Response
     */
    public function destroy(Director $director)
    {
        //
    }
}
