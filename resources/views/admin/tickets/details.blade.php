@extends('layouts.admin')

@section('title','Tickets Details')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            @if (session('success'))
                <script>
                    Swal.fire({
                    title: "Done",
                    text: "{{ session('success') }}",
                    icon: "success",
                    });
                </script>
            @endif
            <div class="row">
                <div class="card-body  shadow p-5 rounded">
                    <h4 class="font-size-16 fw-bold text-center mb-4">Ticket ID #{{ $ticket->ticket_id }}</h4>

                    <div class="d-flex mb-4">
                        <div class="flex-shrink-0 me-3">
                            @if ($ticket->user->avatar)
                                <img class="rounded-circle avatar-sm" src="{{ asset($ticket->user->avatar) }}" alt="User Profile">
                            @else
                            <img class="rounded-circle avatar-sm" src="{{ asset('upload/avatar/default-avatar.png') }}" alt="User Profile">
                            @endif
                        </div>
                        <div class="flex-grow-1">

                            <h5 class="font-size-14 mt-1">{{ $ticket->user->lastname  .' '. $ticket->user->firstname }}</h5>
                            <small class="">{{ $ticket->user->email }}</small>
                        </div>
                    </div>

                    <div>
                        <p> Priority : <span class="badge me-2 bg-danger">High</span></p>

                        <p>Status
                            @if ($ticket->status == 'open')
                                <span class="badge me-2 bg-success">{{ ucfirst($ticket->status) }}</span>
                            @else
                                <span class="badge me-2 bg-danger">{{ ucfirst($ticket->status) }}</span>
                            @endif
                        </p>
                    </div>

                    <h4 class="font-size-16">Title: {{ $ticket->title }}</h4>

                    <p> <b>Message:</b>  {!! $ticket->message !!}</p>
                    <hr/>
                </div>
            </div>

            @if (count($ticket->subTickets) >0)
                <div class="row bg-white shadow p-5">
                    <p class="lead fw-bold">Replies</p>
                    @foreach ($ticket->subTickets->reverse() as $tickets)
                        <div class="card-body bg-light m-2 fw-bold rounded shadow p-2">


                            <h4 class="font-size-16">
                                @if ($tickets->is_admin ==1 )
                                    Admin Reply
                                @else
                                    {{ $ticket->user->firstname .' '. $ticket->user->surname }}
                                @endif
                            </h4>

                            <p{!! $tickets->content !!}</p>
                            <hr/>
                            <div class="d-flex mb-4">
                                <div class="flex-grow-1">
                                    <h5 class="font-size-14  mt-1">{{ explode(' ',$tickets->created_at) [0] }} {{ explode(' ',$tickets->created_at) [1] }}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row bg-white shadow p-5">
                <div class="card-title">
                    Add Reply
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.tickets.update', $ticket->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="ticket_id" value="{{ $ticket->ticket_id }}">
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Message</label>
                            <div class="col-md-10">
                                <textarea name="message" class="form-control" id="editor" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="text-left mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-reply"></i> Reply</button>
                        </div>
                    </form>
                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © {{ env('APP_NAME') }}.
                </div>
            </div>
        </div>
    </footer>
</div>



@endsection
