<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
//use Gate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function listeAdherent()
    {
        $users = User::all()->where('id','>', 2);
        return view('admin.users.index')->with('users',$users);
    }
    

    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,  User $user)
    {
       
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
    public function edit(User $user)
    {
        
        if(Gate::denies('edit-users')){
            return redirect()->route('home.users.index');
        }

        $roles = Role::all();

        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        return redirect()->route('home.users.index');
           
    }

    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect( route('home.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        
        return redirect()->route('home.users.index')->with("success","Enregistrement Supprimé avec Succés");
    }
}
