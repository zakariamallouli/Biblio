<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Livre;
use App\Genre;
use App\Emprunt;
use App\Auteur;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function listelivre()
    {
        $arr['livres'] = Livre::all();
        $arr['auteurs'] = Auteur::all();
        $arr['genres'] = Genre::all();
        return view('listelivre')->with($arr);
    }

    public function livreparAuteur($idauteur)
    {
        $arr['livres'] = Livre::all()->where('idauteur',$idauteur);
        $arr['auteurs'] = Auteur::all();
        $arr['genres'] = Genre::all();
        return view('listelivre')->with($arr);
    }

    public function livreparGenre($idgenre)
    {
        $arr['livres'] = Livre::all()->where('idgenre',$idgenre);
        $arr['auteurs'] = Auteur::all();
        $arr['genres'] = Genre::all();
        return view('listelivre')->with($arr);
    }

    public function reserve(Emprunt $emp, Request $request)
    {
        $emp->idlivre = $request->idlivre;
        $emp->iduser = $request->iduser;
        $emp->statut = $request->statut;
        $emp->save();
        if($emp->save())
            return back()->with("success","Votre demande d'emprunt est en cours de traitement");
        else
            return back()->with("error","Une erreur a été survenu lors d'execution de votre demande, Ressayez !!");
    }

    public function liste()
    {
        $arr["emprunts"] = Emprunt::all()->where('iduser', Auth::user()->id);
        return view('listeEmprunts')->with($arr);
    }
}
