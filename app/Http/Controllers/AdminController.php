<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    /**
    * Handle the incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    
    //Liste des utilisateurs
    public function list(){
        $users=User::all();
        return view("admin.list",compact('users'));
    }  
    
    //Supprimer un utilisateur
    public function destroy($user_id)
    {
        $user= User::find($user_id); //raccourcis qui prend where et first /
        $user->delete();        
        return redirect()->route('listusers')->with('success', 'User delete.');
    } 
    
    
    
    
    public function __invoke(Request $request)
    {
        //
    }
}
