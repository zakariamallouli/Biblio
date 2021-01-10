<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Livre;
use App\Auteur;
use App\Tage;
use App\Genre;

class LivresController extends Controller
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
        $arr['livres'] = Livre::all();
        return view('admin.livres.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['auteurs'] = Auteur::all();
        $arr['genres'] = Genre::all();
        $arr['tags'] = Tage::all();
        return view('admin.livres.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Livre $livre)
    {
        if($request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->move(public_path("livres"),$file);
        }else{
            $file='';
        }
            $livre->image = $file;
            $livre->titre = $request->titre;
            $livre->qte = $request->qte;
            $livre->prix = $request->prix;
            $livre->idauteur = $request->idauteur;
            $livre->idgenre = $request->idgenre;
            $livre->idtag = $request->idtag;
            $livre->resume = $request->resume;
            $livre->langue = $request->langue;
            if($livre->save())
                return redirect('home/livres')->with("success","Enregistrement Modifié avec Succés");
            else
                return back()->with("error","Enregistrement n'a pas été Modifier, Ressayez");
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
    public function edit(Livre $livre)
    {
        $arr['auteurs'] = Auteur::all();
        $arr['genres'] = Genre::all();
        $arr['tags'] = Tage::all();
        $arr['livres'] = $livre;
        return view('admin.livres.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livre $livre)
    {
        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->move(public_path("livres"),$file);

        }else{

            if(!$livre->image)
                $file = '';
            else
            $file = $livre->image;

        }
            $livre->image = $file;
            $livre->titre = $request->titre;
            $livre->qte = $request->qte;
            $livre->prix = $request->prix;
            $livre->idauteur = $request->idauteur;
            $livre->idgenre = $request->idgenre;
            $livre->idtag = $request->idtag;
            $livre->resume = $request->resume;
            $livre->langue = $request->langue;
            if($livre->save())
                return  redirect('home/livres')->with("success","Enregistrement Modifié avec Succés");
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
        Livre::destroy($id);
        return redirect()->route('home.livres.index')->with("success","Enregistrement Supprimé avec Succés");
    }
}
