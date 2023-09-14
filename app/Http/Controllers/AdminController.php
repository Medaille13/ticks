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
    
    public function index()
    {         
        dump(session()->all());
        return view('home');
    } 
    
    //Liste des utilisateurs
    public function list(){
        $users=User::all();
        return view("admin.list",compact('users'));
    }   
    
    
    public function __invoke(Request $request)
    {
        //
    }
}
