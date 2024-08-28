<x-app-layout>

	@section('title', 'Buy Crypto')

	@section('content')
    <style>
.dashboard-body {
    height: 100vh !important;
}
    </style>

	<!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <div class="my-3">
			<div class="row justify-content-center">
				<div class="col-md-6 transfer-coin-card col-10">
					<div class="transfer-coin-inner-card">
						<p>Transfer NGN{{ number_format($order->amount, 2) }} to Buyjet</p>
					</div>
					<div class="py-4 row">
						<div class="col-md-6 col-6">
							<span class="text-secondary"><small>Account Number</small><br></span>
							<span class="coin-info">
								<h5 class="pt-2">{{ $general_settings->account_number }}</h5>
							</span>
						</div>
						<div class="col-md-6 col-6">
							<span class="text-secondary"><small>Bank Name</small><br></span>
							<span class="coin-info">
								<h5 class="pt-2">{{ $general_settings->bank_name }}</h5>
							</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-6">
							<span class="text-secondary"><small>Account Name</small><br></span>
							<span class="coin-info">
								<h5 class="pt-2">{{ $general_settings->account_name }}</h5>
							</span>
						</div>
						<div class="col-md-6 col-6">
							<span class="text-secondary"><small>Amount (NGN)</small><br></span>
							<span class="coin-info">
								<h5 class="pt-2">{{ number_format($order->amount, 2) }}</h5>
							</span>
						</div>
					</div>
                    <form action="{{ route('buy.update', $order->trx_hash) }}" method="post"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="container-side">
                            <div class="drop-section">
                                <div class="">
                                    <div class="cloud-icon">
                                        <img src="{{ asset('assets/icons/upload.png')}}" alt="cloud" id="selected-img"  class="file-selector" >
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="drop-here">Drop Here</div>
                                </div>
                            </div>

                            <input type="file" name="payment_proof" id="selectedimage" class="file-selector-input" multiple>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5 mt-5" ><small>I have made my
                                        payment</small></button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</section>

    @endsection

</x-app-layout>
