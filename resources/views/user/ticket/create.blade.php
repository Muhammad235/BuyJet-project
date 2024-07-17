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
                    <form action="">
                        <div>
                            <label><small>Your problem</small></label>
                            <input Value="Apple Itunes Error" class="form-control eth-input mt-2" type="text">
                        </div>
                        <div class="my-5">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control form-control eth-input mt-1" id="exampleFormControlTextarea1"
                                rows="10"
                                placeholder="Explain the problem faced, to aid us in helping you better"></textarea>
                        </div>
                        <div>
                            <label><small>Attachment</small></label>
                            <input placeholder="Apple Itunes Error" class="form-control ath-input mt-2" type="file">
                        </div>

                        <div class="input-button">
                            <a href="ticketStatus.html" class="text-white">
                                <input type="submi" class="btn btn-primary create-button" value="Create Ticket">
                            </a>
                            <input type="submi" class="btn btn-secondary submit-button" value="Cancel">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

</x-app-layout>

{{ asset('assets/images/notify.png') }}