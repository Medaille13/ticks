<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        //dump(session()->all());
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create')->with('roles', $roles);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $user = new User();  // création d'une classe qui va prendre en structure toutes les colonnes obligatoire de ma table ticket
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        //dd($ticket->toArray());
        $user->save();
        $user->syncRoles($request->role);
        return redirect()->route('crud.index')->with('success', 'Utilisateur rajouté !');   

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $users)
    {
        //$users = User::find($users);
        //return view('admin/show')->with('users', $users); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = User::find($user_id);
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {       
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();        

        //$user->assignRole($request->role); va conserver si sauvegarde de l'edition tous les roles
        $user->syncRoles($request->role); //va n'en conserver qu'un à chaque edit
        return redirect()->route('crud.index');    
        //dd($user->toArray());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user= User::find($user_id);
        $user->delete();
        return redirect()->route('crud.index')->with('success', 'Utilisateur supprimé!');
         
    }
}
