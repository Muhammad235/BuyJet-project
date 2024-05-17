@extends('layouts.admin')

@section('title','Tickets list')

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
                <div class="card">
                    <div class="btn-toolbar p-3" role="toolbar">
                        {{-- <div class="btn-group me-2 mb-2 mb-sm-0">
                            <a href="{{ route('ticket.create') }}" class="btn btn-primary waves-light waves-effect"><i class="fa fa-plus"></i> Open Ticket</a> 
                        </div> --}}

                    </div>
                   
                    <ul class="message-list">
                        @foreach ($tickets as $ticket)
                        <li @if ($ticket->status == 'Open')
                            class="unread mb-2"
                        @endif>
                            <div class="col-mail col-mail-1">
                                <div class="checkbox-wrapper-mail">
                                    @if ($ticket->priority == 'High')
                                        <span class="badge me-2 bg-danger">{{ $ticket->priority }}</span>
                                    @elseif ($ticket->priority == 'Medium')
                                        <span class="badge me-2 bg-warning">{{ $ticket->priority }}</span>
                                    @else
                                        <span class="badge me-2 bg-primary">{{ $ticket->priority }}</span>
                                        
                                    @endif
                                </div>
                                <a href="{{ route('admin.tickets.show',$ticket->id) }}" class="title fw-bold">
                                    {{ $ticket->title }}
                                    @if ($ticket->status == 'Open')
                                        <span class="badge me-2 bg-success">{{ $ticket->status }}</span> 
                                    @else
                                        <span class="badge me-2 bg-primary">{{ $ticket->status }}</span>
                                        
                                    @endif
                                </a>
                            </div>
                            <div class="col-mail col-mail-2">
                                <a href="{{ route('admin.tickets.show',$ticket->id) }}" class="subject">
                                    <span class="px-2 fw-bold">#{{ $ticket->ticketid }}</span>
                                    <span class="teaser">{{ implode(' ', array_slice(explode(' ', strip_tags($ticket->message)), 0, 50)) }} </span>
                                </a>
                                <div class="date">{{ explode(' ', $ticket->created_at)[0] }}</div>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                </div>
                {{ $tickets->links('custom.pagination') }}
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