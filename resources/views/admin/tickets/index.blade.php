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
                        <div class="btn-group me-2 mb-2 mb-sm-0">
                            <a href="" class="btn btn-primary waves-light waves-effect"><i class="fa fa-plus"></i> Open Ticket</a>
                        </div>

                    </div>

                    <ul class="message-list">
                        @foreach ($tickets as $ticket)
                        <li @if ($ticket->status == 'open') class="unread mb-2" @endif>

                            <a href="{{ route('admin.tickets.show', $ticket->id) }}" class="d-flex justify-content-between align-items-center">
                                <div class="px-1">
                                    <b>#: {{ $ticket->ticket_id }}</b>
                                </div>

                                <div class="px-3">
                                    <b class="d-none d-lg-block">Title: <span>{{ \Illuminate\Support\Str::limit($ticket->title, 100) }}</span></b>
                                    <b class="d-lg-none">Title: <span>{{ \Illuminate\Support\Str::limit($ticket->title, 20) }}</span></b>
                                </div>


                                <div class="message px-3 d-none d-md-block">
                                    <b>Message: <span>{{ \Illuminate\Support\Str::limit($ticket->message, 70) }}</span></b>
                                </div>

                                <div>
                                    @if ($ticket->status == 'open')
                                        <span class="badge me-2 bg-success">{{ ucfirst($ticket->status) }}</span>
                                    @else
                                        <span class="badge me-2 bg-danger">{{ ucfirst($ticket->status) }}</span>
                                    @endif
                                </div>
                            </a>

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
