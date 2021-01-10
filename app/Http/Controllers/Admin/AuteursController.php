<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auteur;

class AuteursController extends Controller
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
        $arr['auteurs'] = Auteur::all();
        return view('admin.auteurs.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.auteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  Auteur $auteur)
    {
        $auteur->nom = $request->nom;
        $auteur->prenom = $request->prenom;
        $auteur->nationalite = $request->nationalite;
        $auteur->biographie = $request->biographie;
        $auteur->save();
        if($auteur->save())
            return redirect('home/auteurs')->with("success","Enregistrement Ajouté avec Succés");
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
    public function edit(Auteur $auteur)
    {
        $arr['auteur'] = $auteur;
        return view('admin.auteurs.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auteur $auteur)
    {
        $auteur->nom = $request->nom;
        $auteur->prenom = $request->prenom;
        $auteur->nationalite = $request->nationalite;
        $auteur->biographie = $request->biographie;
        $auteur->save();
        if($auteur->save())
            return redirect('home/auteurs')->with("success","Enregistrement Modifié avec Succés");
        else
            return back()->with("error","Enregistrement n'a pas été Modifier, Ressayez");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Auteur::destroy($id);
        return redirect()->route('home.auteurs.index')->with("success","Enregistrement Supprimé avec Succés");
    }
}
