<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;



class RolesController extends Controller
{
    // create store edit update delete
    
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index')->with('roles', $roles);
    }
    
    
    public function create()   //affiche le formulaire pour créer 
    {
        return view('admin.roles.create');
    }
    
    
    public function store(Request $request)
    {
        //dd($request->name);
        $role = Role::create(['name' => $request->name]); //équivalant ligne 34 35 36   // classe role qui va créer en bdd un nouveau role via l'input
        
        /*$role = new Role();
        $role->name = $request->name; //le nom de mon role aura la valeur de mon inpute
        $role->save();*/
        
        return redirect()->route('roles.index')->with('success','rôle créé avec succès');
    }
    
    
    public function edit($role_id)
    {
        $role = Role::find($role_id);
        //dd($role);
        return view('admin.roles.edit',compact('role'));
    } 
    
    
    public function update(Request $request, $role_id)
    {
        $role = Role::find($role_id);
        $role->name = $request->nom;
        $role->save();
        return redirect()->route('roles.index');
          
    }
    
    
    public function destroy($role_id)
    {
        //dd($role_id, $request->all());
        $role = Role::find($role_id);
        $role->delete();
        return redirect()->route('roles.index')->with('success','rôle supprimé avec succès');
        
    }
    
    
}
