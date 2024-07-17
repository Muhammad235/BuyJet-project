<x-app-layout>

	@section('title', 'Ticket')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <div class="ticket-body-section">
            <div>
                <div class="ticket-body">
                    <h3>Hi, How can we help you?</h3>
                    <p><small>Use Knowledge Base below to find answers or use the button below to create a
                            ticket below if you need support with our agent</small> </p>
                </div>
                <div class="row justify-content-center tick">
                    <div class="col-md-4">
                        <a href="{{ route('ticket.create') }}">
                            <div class="box-container">
                                <div>
                                    <img src="{{ asset('assets/images/create.png') }}" alt="" width="90%">
                                </div>
                                <div class="box-inner">
                                    <h6 class="text-dark">Create a Ticket</h6>
                                    <p class="text-dark">Write about your complaint</p>
                                </div>
                            </div>
                        </a> 
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('ticket.create') }}">
                            <div class="box-container">
                                <div>
                                    <img src="{{ asset('assets/images/create.png') }}" alt="" width="90%">
                                </div>
                                <div class="box-inner">
                                    <h6 class="text-dark">View Ticket</h6>
                                    <p class="text-dark">View ongoing and resolved tickets</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-5">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Lorem ipsum lorem ipsum ipsum ?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Ut enim ad minim veniam quis nostrud exercitation ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat aute irure dolor
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Lorem ipsum lorem ipsum ipsum ?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Ut enim ad minim veniam quis nostrud exercitation ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat aute irure dolor
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Lorem ipsum lorem ipsum ipsum ?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Ut enim ad minim veniam quis nostrud exercitation ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat aute irure dolor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="true"
                                            aria-controls="collapseFour">
                                            Lorem ipsum lorem ipsum ipsum ?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse show"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Ut enim ad minim veniam quis nostrud exercitation ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat aute irure dolor
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            Lorem ipsum lorem ipsum ipsum ?
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Ut enim ad minim veniam quis nostrud exercitation ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat aute irure dolor
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                            aria-expanded="false" aria-controls="collapseSix">
                                            Lorem ipsum lorem ipsum ipsum ?
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse"
                                        aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Ut enim ad minim veniam quis nostrud exercitation ullamco
                                            laboris nisi ut aliquip ex ea commodo consequat aute irure dolor
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- </section> --}}
@endsection

</x-app-layout>

{{ asset('assets/images/notify.png') }}