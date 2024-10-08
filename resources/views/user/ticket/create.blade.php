<x-app-layout>

	@section('title', 'Payment successful')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <div class="ticket-body-section">
            <div class="ticket-body-text">
                <h3>Create Ticket for your problem</h3>
                <div class="mt-4">
                    <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label><small>Your problem</small></label>
                            <input name="title" placeholder="state your issue" value="{{ old('title') }}" class="form-control eth-input mt-2" type="text">
                        </div>
                        <div class="my-5">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control form-control eth-input mt-1" id="exampleFormControlTextarea1"
                                rows="10"
                                placeholder="Explain the problem faced, to aid us in helping you better" name="message" value="{{ old('message') }}"></textarea>
                        </div>
                        <div>
                            <label><small>Attachment</small></label>
                            <input type="file" name="attachment" class="form-control ath-input mt-2" >
                        </div>

                        <div class="input-button">
                            {{-- <a href="ticketStatus.html" class="text-white"> --}}
                                <input type="submit" class="btn btn-primary create-button" value="Create Ticket">
                            {{-- </a> --}}
                            {{-- <input type="submit" class="btn btn-secondary submit-button" value="Cancel"> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

</x-app-layout>

<x-bottom-nav :page="$page" />
