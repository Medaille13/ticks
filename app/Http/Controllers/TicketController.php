<?php

namespace App\Http\Controllers;

use App\Models\Discution;
use Illuminate\Http\Request;
use App\Models\Ticket;


class TicketController extends Controller
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
        $tickets = Ticket::all();
        //dump(session()->all());
        return view('ticket.index')->with('tickets', $tickets);

        // $discutions = $tickets->where('message');
        //return view('ticket.index')->with('tickets', $tickets, $discutions)
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('ticket.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input,auth()->id());
        $ticket = new Ticket();  // création d'une classe qui va prendre en structure toutes les colonnes obligatoire de ma table ticket
        $ticket->title = $request->title;
        $ticket->category = $request->category;
        $ticket->priority = $request->priority;
        $ticket->content = $request->content;
        $ticket->user_id = auth()->id();
        //dd($ticket->toArray());
        $ticket->save();
        return redirect()->route('tickets.index')->with('success', 'Ticket rajouté !'); 
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Ticket  $ticket
    * @return \Illuminate\Http\Response
    */
    public function show(Ticket $ticket)
    {
                
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Ticket  $ticket
    * @return \Illuminate\Http\Response
    */
    public function edit($ticket_id)
    {
        $ticket = Ticket::where('id', $ticket_id)->with(['discutions_users','user:id,email,name'])->withCount('discutions')->first();
        //dd($ticket);        
        //dd($ticket->toArray()); 
        return view('ticket.edit')->with('ticket', $ticket);
    } 
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Ticket  $ticket
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Ticket $ticket)
    {
        $ticket->title = $request->title;
        $ticket->category = $request->category;
        $ticket->priority = $request->priority;
        $ticket->content = $request->content;
        $ticket->user_id = auth()->id();        
        $ticket->save();        
        return redirect()->route('tickets.index')->with('success', 'Ticket modifié !'); 
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Product  $product
    * @return \Illuminate\Http\Response
    */
    public function destroy($ticket_id)
    {
        $ticket = Ticket::find($ticket_id);
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success','ticket supprimé avec succès');  
    }
    
    public function reponse($ticket_id, Request $request)
    {
        $discution = new Discution();
        $discution->content = $request->content; 
        $discution->ticket_id = $ticket_id;
        $discution->user_id = auth()->id();
        //dd($discution);
        $discution->save();
        return redirect()->back();
    }
}