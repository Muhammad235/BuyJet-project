<x-app-layout>

	@section('title', 'Payment successful')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <div class="my-3">
            <div class="row justify-content-center">
                <div class="col-md-6 transfer-coin-card col-11">
                    <div class="transfer-coin-inner-card">
                        <p>Order #{{ $reference }} NGN {{ number_format($amount, 2) }} </p>
                    </div>
                    <div class="step-container">
                        <div class="steppers">
                            <img src="{{ asset('assets/images/bit-flow.png') }}" alt="">
                        </div>
                        <div class="stepper" style="display: none;">
                            <img src="{{ asset('assets/images/bit-flows.png') }}" alt="">
                        </div>
                    </div>

                    <div class="flow-buttons">
                        <a href="{{ route('dashboard') }}"><button class="btn btn-secondary"><small>Back to
                                    Dashboard</small></button></a>

                        <a href="{{ route('transactions.all') }}">
                            <button class="btn btn-primary order-button"><small>View Order Details</small></button>
                        </a>

                        <a href="{{ route('transactions.all') }}"><button class="btn btn-primary complete-button"
                                style="display: none;"><small>View Order Details</small></button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

</x-app-layout>
