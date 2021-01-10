<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Emprunt;
use App\User;
use App\Livre;

class EmpruntsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['emprunts'] = Emprunt::all();
        return  view('admin.emprunts.index')->with($arr);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['livres'] = Livre::all();
        $arr['users'] = User::all()->where('id','>',2);
        return view('admin.emprunts.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Emprunt $emp)
    {
        $emp->date_emprunt = $request->date_emprunt;
        $emp->date_retour = $request->date_retour;
        $emp->statut = $request->statut;
        $emp->idlivre = $request->idlivre;
        $emp->iduser = $request->iduser;
        if($emp->save())
            return  redirect('home/emprunts')->with("success","Enregistrement Modifié avec Succés");
        else
            return back()->with("error","Enregistrement n'a pas été Modifier, Ressayez");
    } 

    /*
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
    public function edit(Emprunt $emp)
    {
        $arr['emprunts'] = $emp;
        $arr['livres'] = Livre::all();
        $arr['users'] = User::all()->where('role','user');
        return view('home.emprunts.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emprunt $emp)
    {
        $emp->date_emprunt = $request->date_emprunt;
        $emp->date_retour = $request->date_retour;
        $emp->statut = $request->statut;
        $emp->idlivre = $request->idlivre;
        $emp->iduser = $request->iduser;
        if($emp->save())
            return  redirect('home/emprunts')->with("success","Enregistrement Modifié avec Succés");
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
        Emprunt::destroy($id);
        return redirect()->route('home.emprunts.index')->with("success","Enregistrement Supprimé avec Succés");
    }
}
