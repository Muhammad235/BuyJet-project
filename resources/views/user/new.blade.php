<x-app-layout>

	@section('title', 'Payment successful')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />
    </section>
@endsection

</x-app-layout>

{{ asset('assets/images/notify.png') }}


<div class="col-mail col-mail-1">
    <div class="checkbox-wrapper-mail">
        {{-- @if ($ticket->priority == 'high') --}}
            <span class="badge me-2 bg-danger">High</span>
        {{-- @elseif ($ticket->priority == 'edium') --}}
            {{-- <span class="badge me-2 bg-warning">{{ $ticket->priority }}</span> --}}
        {{-- @else --}}
            {{-- <span class="badge me-2 bg-primary">high</span> --}}

        {{-- @endif --}}
    </div>
    <a href="{{ route('admin.tickets.show',$ticket->id) }}" class="title fw-bold">
        Title: {{ $ticket->title }}
        {{-- @if ($ticket->status == 'Open')
            <span class="badge me-2 bg-success">{{ $ticket->status }}</span>
        @else
            <span class="badge me-2 bg-primary">{{ $ticket->status }}</span>

        @endif --}}
    </a>
</div>
