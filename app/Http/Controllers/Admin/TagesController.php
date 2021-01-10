<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tage;

class TagesController extends Controller
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
        $arr['tages'] = Tage::all();
        return view('admin.tages.index')->with($arr);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tage $tage)
    {
        $tage->tage = $request->tage;
        $tage->save();
        if($tage->save())
            return redirect('home/tages')->with("success","Enregistrement Ajouté avec Succés");
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
    public function edit(Tage $tage)
    {
        $arr['tage'] = $tage;
        return view('admin.tages.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tage $tage)
    {
        $tage->tage = $request->tage;
        $tage->save();
        if($tage->save())
            return redirect('home/tages')->with("success","Enregistrement Ajouté avec Succés");
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
        Tage::destroy($id);
        return redirect()->route('home.tages.index')>with("success","Enregistrement Supprimé avec Succés");
    }
}
