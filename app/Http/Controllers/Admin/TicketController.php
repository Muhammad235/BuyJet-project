<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function index(){
        $tickets = $tickets = Ticket::orderBy('updated_at', 'desc')
        ->orderByRaw("FIELD(status, 'open', 'close')")
        ->paginate();

        return view('admin.tickets.index', compact('tickets'));
    }

    public function show($id)
    {
       $ticket = Ticket::where('id',$id)->with('user')->with('subTickets')->first();

        // $ticket = $ticket->with('user')->with('subTickets');

        return view('admin.tickets.details', compact('ticket'));
    }
}
