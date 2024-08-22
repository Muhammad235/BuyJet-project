<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Status;
use App\Models\SubTicket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubTicketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|max:500',
            'ticket_id' => 'required'
        ]);

        SubTicket::create([
            'ticket_id' => $request->ticket_id,
            'message' => $request->message,
            'is_admin' => Status::YES
        ]);

        return back()->with('success', 'Reply sent successfully');
    }
}
