<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Genre;

class GenresController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['genres'] = Genre::all();
        return view('admin.genres.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  Genre $genre)
    {
        $genre->genre = $request->genre;
        $genre->save();
        if($genre->save())
            return redirect('home/genres')->with("success","Enregistrement Ajouté avec Succés");
        else
            return back()->with("error","Enregistrement n'a pas été ajouté, Ressayez");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        $arr['genre'] = $genre;
        return view('admin.genres.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        $genre->genre = $request->genre;
        $genre->save();
        if($genre->save())
            return redirect('home/genres')->with("success","Enregistrement Ajouté avec Succés");
        else
            return back()->with("error","Enregistrement n'a pas été ajouté, Ressayez");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Genre::destroy($id);
        return redirect()->route('home.genres.index')->with("success","Enregistrement Supprimé avec Succés");
    }
}
