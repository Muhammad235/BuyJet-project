<?php

namespace App\Http\Controllers\User;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use App\Traits\GenerateTrxHash;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateTicketRequest;

class TicketController extends Controller
{

    use GenerateTrxHash;
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user =  auth()->user();
        return view('user.ticket.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user =  auth()->user();
        return view('user.ticket.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTicketRequest $request)
    {
        $user = auth()->user();

        $requestData = $request->validated();

        $requestData['ticket_id'] = rand(1000, 1000001);

        $attachment = $this->uploadImage($request, 'attachment', '/upload/ticket_attachment');
        $requestData['attachment'] = $attachment;

        $user->tickets()->create($requestData);

        toastr()->success('Ticket submitted');
        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
