<x-app-layout>

	@section('title', 'Buy Crypto')

	@section('content')
	<!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <div class="my-3">
			<div class="row justify-content-center">
				<div class="col-md-6 transfer-coin-card col-10">
					<div class="transfer-coin-inner-card">
						<p>Transfer NGN30,000 to Buyjet</p>
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
								<h5 class="pt-2">30,000</h5>
							</span>
						</div>
					</div>
                    <form action="{{ route('buy.update', 1) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="container-side">
                            <div class="drop-section">
                                <div class="col">
                                    <div class="cloud-icon">
                                        <img src="{{ asset('assets/icons/upload.png')}}" alt="cloud">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="drop-here">Drop Here</div>
                                </div>
                            </div>
                            <div class="list-section">
                                <div class="list">
                                    <!-- <li class="in-prog">
                                        <div class="col">
                                            <img src="icons/image.png" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="file-name">
                                                <div class="name">File Name Here</div>
                                            </div>
                                            <div class="file-size"></div>
                                            <div class="containers">
                                                <div class="file-progress">
                                                    <span class="team"></span>
                                                </div>
                                                <span class="span-number">0%</span>
                                            </div>
                                        </div>
                                        <div class="close">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="cross" viewBox="0 -960 960 960"
                                                fill="#e8eaed">
                                                <path
                                                    d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="tick" viewBox="0 -960 960 960"
                                                fill="#e8eaed">
                                                <path d="M400-304 240-464l56-56 104 104 264-264 56 56-320 320Z" />
                                            </svg>
                                        </div>
                                    </li> --> 
                                </div>
                            </div>
                            <button type="button" class="file-selector btn btn-secondary">Upload</button>

                            <input type="file" name="payment_proof" class="file-selector-input" multiple>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary px-5 mt-5" ><small>I have made my
                                        payment</small></button>
                        </div>
                    {{-- </form> --}}
				</div>
			</div>
		</div>
	</section>

    @endsection

</x-app-layout>