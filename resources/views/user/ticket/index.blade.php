<x-app-layout>

	@section('title', 'Ticket')

	@section('content')

    <style>

    </style>

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
                        <a href="{{ route('tickets.create') }}">
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
                        <a href="{{ route('tickets.create') }}">
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
                                            How do I place an order on the platform?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            To place an order, select the cryptocurrency or gift card you'd like to buy or sell, enter the necessary details, and confirm your order. Once submitted, we will  process and fulfill it within a short period of time.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            How long does it take to fulfill an order?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            It usually takes between 5 to 30 minutes during business hours. You’ll receive a confirmation once your order is completed.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseFour" aria-expanded="true"
                                            aria-controls="collapseFour">
                                            What payment methods do you accept?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse show"
                                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            We accept  bank transfers, Payment details will be provided during the checkout process.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            Is there a minimum or maximum order limit?
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            Yes, the minimum and maximum order limits depend on the specific cryptocurrency or gift card. Please refer to the product page for specific limits.

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mt-3">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                            aria-expanded="false" aria-controls="collapseSix">
                                            What should I do if my order is delayed?
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse"
                                        aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            If your order hasn't been processed within the expected time frame, please create a ticket regarding the problem or reach out to our support team via email with your order number. We'll resolve the issue as quickly as possible.
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

<x-bottom-nav :page="$page" />
