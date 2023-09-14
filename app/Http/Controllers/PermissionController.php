<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index')->with('permissions', $permissions);        
    }
    
    public function create()   //affiche le formulaire pour créer 
    {
        return view('admin.permissions.create');
    }
    
    public function store(Request $request)
    {
        //dd($request->name);
        $permissions = Permission::create(['name' => $request->name]); //équivalant ligne 34 35 36   // classe role qui va créer en bdd un nouveau role via l'input
        
        /*$role = new Role();
        $role->name = $request->name; //le nom de mon role aura la valeur de mon inpute
        $role->save();*/
        return redirect()->route('permissions.index')->with('success','permission créée avec succès');
    }
    
    public function edit($permission_id)
    {
        $permission = Permission::find($permission_id);
        //dd($role);
        return view('admin.permissions.edit',compact('permission'));
    } 
    
    
    public function update(Request $request, $permission_id)
    {
        $permission = Permission::find($permission_id);
        $permission->name = $request->nom;
        $permission->save();
        return redirect()->route('permissions.index');
    }
    
    
    public function destroy($permission_id)
    {
        //dd($role_id, $request->all());
        $permission = Permission::find($permission_id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('success','permission supprimée avec succès');
        
    }    
    
}
