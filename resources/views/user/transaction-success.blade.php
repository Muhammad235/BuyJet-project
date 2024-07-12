<x-app-layout>

	@section('title', 'Payment successful')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <div class="my-3">
            <div class="row justify-content-center">
                <div class="col-md-6 gif col-10">
                    <h2 class="text-center">Transaction Completed</h2>

                    <div class="gif-image">
                        <img src="{{ asset('assets/images/gif.webp') }}" alt="">
                    </div>

                    <div class="gif-button">
                        <a href="{{ route('dashboard') }}"><button class="btn btn-secondary">Back to Dashboard</button></a>
                        <a href="{{ route('dashboard') }}"><button class="btn btn-primary">View Order Details</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

</x-app-layout>