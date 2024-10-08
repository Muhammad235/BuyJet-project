<x-app-layout>

	@section('title', 'User Dashboard')

	@section('content')

    <style>

    .dropdown {
     position: relative;
     display: inline-block;
    }

  .dropdown-button {
    color: white;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
  }

  .dropdown-button:focus {
    outline: none;
  }

  .dropdown-menu {
    display: none;
    position: absolute;
    background-color: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    z-index: 1;
    margin-top: 5px;
    padding: 0;
    list-style: none;
    min-width: 5rem;
  }

  .dropdown-menu li {
    border-bottom: 1px solid #ddd;
  }

  .dropdown-menu li:last-child {
    border-bottom: none;
  }

  .dropdown-menu li a {
    color: black;
    padding: 10px;
    text-decoration: none;
    display: block;
  }

  .dropdown-menu li a:hover {
    background-color: #f1f1f1;
  }

  .dashboard-body {
    height: 100% !important;
  }
</style>

	<!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />
		<main class="body">
			<div class="body-top row">
				<div class="col-md-9 col-12">
					<div class="rate-section-row row">
						<span class="mobile-welcome-text">Welcome, <span>{{ $user->firstname }}</span></span>
						<div class="col-md-4 col-12 aaa">
							<div class="rate-section shadow">
								<div class="dollar">
									<i class="fa fa-dollar"></i>
								</div>
								<div class="rate-section-container rate-total">
									<span class="text-white">Total Tansactions</span>
									<h5>NGN {{ number_format($totalAmount, 2) }}</h5>
								</div>
							</div>
							<div class="rate-sect"></div>
						</div>

						{{-- <div class="col-md-8 col-12">
							<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img src="{{ asset('assets/images/slider_image.png') }}" width="100%" alt="">
									</div>
									<div class="carousel-item">
										<img src="{{ asset('assets/images/slider_image.png') }}" alt="" width="100%">
									</div>
								</div>
							</div>
							<div class="carousel-indicator">
								<button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="0"
									class="active" aria-current="true" aria-label="Slide 1"></button>
								<button type="button" data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="1"
									aria-label="Slide 2" class=""></button>
							</div>
						</div> --}}

                        <div class="col-md-8 col-12">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img src="{{ asset('assets/images/slider_image.webp') }}" width="100%" height="100%" alt="Slide 1" style="border-radius: 10px;">
                                </div>
                                <div class="carousel-item">
                                  <img src="{{ asset('assets/images/slider_image.webp') }}" width="100%" height="100%" alt="Slide 2" style="border-radius: 6%;">
                                </div>
                              </div>
                            </div>
                          </div>

					</div>

					<div class="quick-action row">
						<div class="col-md-3 text-center quick col-12">Quick Actions</div>
						<div class="col-md-3 col-4">
							<a href="{{ route('buy.create') }}"><img src="{{ asset('assets/images/buy.png') }}" alt="" class="d-none d-md-block"></a>
							<a href="{{ route('buy.create') }}"><img src="{{ asset('assets/images/m-buy.png') }}" alt="" class="d-block d-md-none"></a>
						</div>
						<div class="col-md-3 col-4">
							<a href="{{ route('sell.create') }}"><img src="{{ asset('assets/images/sell.png') }}" alt="" class="d-none d-md-block"></a>
							<a href="{{ route('sell.create') }}"><img src="{{ asset('assets/images/m-sell.png') }}" alt="" class="d-block d-md-none"></a>
						</div>
						<div class="col-md-3 col-4">
							<a href="{{ route('giftcard.create') }}"><img src="{{ asset('assets/images/gift.png') }}" alt="" class="d-none d-md-block"></a>
							<a href="{{ route('giftcard.create') }}"><img src="{{ asset('assets/images/m-gift.png') }}" alt="" class="d-block d-md-none"></a>
						</div>
					</div>
				</div>
				<div class="col-md-3 mobile-rate">
					<div class="rate-box d-none d-md-block">
						<p><small>Crypto <br> Exchange Rate</small></p>
					</div>
					<div class="sell-box col-md-12 col-6">
						<p><small><span>Selling Rate</span> <br> ₦{{ number_format($general_settings->sell_rate, 2) }}</small></p>
					</div>
					<div class="buy-box col-md-12 col-6">
						<p><small><span>Buying Rate</span> <br> ₦{{ number_format($general_settings->buy_rate, 2) }}</small></p>
					</div>
				</div>

			</div>
			<div class="body-bottom row mb-4">
				<div class="col-md-9 col-12 mobile-table">
					<div class="history-section-row">
						<div class="history-section">
							<div class="header-history">
								<div>
									<span class="">Recent Transactions</span>
								</div>

								<div>
                                    <div class="dropdown pt-4">
                                        <button class="btn btn-secondary dropdown-button" id="dropdownButton">{{ $type }}
                                            <i class="fas fa-caret-down"></i>
                                        </button>
                                        <ul class="dropdown-menu" id="dropdownMenu">
                                            @if($type != "Buy")
                                                <li><a href="{{ url('/dashboard?type=buy') }}">Buy Crypto</a></li>
                                            @endif
                                            @if($type != "Sell")
                                                <li><a href="{{ url('/dashboard?type=sell') }}">Sell Crypto</a></li>
                                            @endif
                                            @if($type != "Gift Card")
                                                <li><a href="{{ url('/dashboard?type=giftcard') }}">Sell Gift Card</a></li>
                                            @endif
                                        </ul>
                                    </div>
								</div>
							</div>

							<div class="table-section pb-2">
								@if (count($transactions) > 0)
									@foreach ($transactions as $transaction)
									<div class="table-section-row">
										<div class="table-section-wrapper pb-2">

                                            <img src="{{ asset(@$transaction->cryptocurrency->symbol ?? @$transaction->giftcard->symbol) }}"
                                                class="rounded-circle"
                                                style="width: 3rem; height: 3rem;"
                                                alt="{{ @$transaction->cryptocurrency->name ?? @$transaction->giftcard->name }}">


											<div class="date-wrap">
												<p>{{ @$transaction->cryptocurrency->name }}</p>
												<p>{{ @$transaction->giftcard->name }} <span>{{ @$transaction->currency->name }}</span></p>

												{{-- <span>{{ @$transaction->created_at->format('F d Y, h:i:sa') }}</span> --}}
												<span>{{ $transaction->created_at }}</span>
											</div>
										</div>


										<div class="transac-status text-center">
											<p>₦ {{ number_format($transaction->amount, 2) }}</p>

											@if ($transaction->status == 1)
												<span class="status-success ">Success</span>
												@elseif ($transaction->status == 2)
												<span class="status-spending">Processing</span>
												@elseif ($transaction->status == 3)
												<span class="status-failed">Failed</span>
											@endif

										</div>
									</div>
									@endforeach
								@else
									<div class="table-section-ntp">
										<img src="{{ asset('assets/images/mobile-ntp.png')}}" alt="" width="80%">
									</div>
									<div class="table-section-desktop-ntp">
										<img src="{{ asset('assets/images/ntp.png')}}" alt="" width="50%">
									</div>
								@endif

							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 eth-mob col-12">
					<div class="coin-section">
						<div class="coin-section-row row">
							<div class="col-md-4 col-5">
								<a href="">
									<div class="active-type buy buyCoinBtn">Buy</div>
								</a>
							</div>
							<div class="col-md-4 col-5">
								<a href="">
									<div class="buy sellCoinBtn">Sell</div>
								</a>
							</div>
						</div>
						<div class="coin-container">
							<form action="{{ route('buy.create') }}" method="get" class="buyCoin">
								<span><small>Coin</small></span>
								<select class="eth-input mb-2" name="cryptocurrency" onchange="buyCryptoAmountInNaira()">
									<option class="text-light" selected disabled>Select Cryptocurrency</option>

									@foreach ($cryptocurrencies as $cryptocurrency)
										<option class="text-light" value="{{ old('cryptocurrency', $cryptocurrency->id) }}">{{ $cryptocurrency->name }}</option>
									@endforeach

								</select>

								<span><small>Amount</small></span>

								<input type="text" hidden name="" id="rates-value" data-buyRate = {{ $general_settings->buy_rate }} data-sellRate = {{ $general_settings->sell_rate }}>

								<div class="input-group mt-2">
									<input type="text" class="form-control eth-input-group" id="buy_crypto_amount" placeholder="0" name="amount" value="{{ old('amount') }}" oninput="validateInput(this); buyCryptoAmountInNaira();">
									<span class="input-group-text">USD</span>
								</div>
								<div class="total pt-3">
									<p>Total</p>
									<p id="buy-sub-amount">NGN 0</p>
								</div>

                                <button class="btn text-center btn-primary form-control">Buy</button>
							</form>

							<form action="{{ route('sell.create') }}" method="get" class="sellCoin d-none">
								<span><small>Coin</small></span>
								<select class="eth-input mb-2" name="cryptocurrency" onchange="sellCryptoAmountInNaira()">
									<option class="text-light" selected disabled>Select Cryptocurrency</option>

									@foreach ($cryptocurrencies as $cryptocurrency)
										<option class="text-light" value="{{ old('cryptocurrency', $cryptocurrency->id) }}">{{ $cryptocurrency->name }}</option>
									@endforeach

								</select>

								<span><small>Amount</small></span>

								<div class="input-group mt-2">
									<input type="text" class="form-control eth-input-group" id="sell_crypto_amount" placeholder="0" name="amount" value="{{ old('amount') }}" oninput="validateInput(this); sellCryptoAmountInNaira();">
									<span class="input-group-text">USD</span>
								</div>
								<div class="total pt-3">
									<p>Total</p>
									<p id="sell-sub-amount">NGN 0</p>
								</div>
                                <button class="btn text-center btn-primary form-control">Sell</button>

							</form>

						</div>
					</div>
					<div class="quick-action-section-row d-none d-md-block">
						<div class="quick-action-section">
							<div class="spacing">
								<div>
									<h6>Download Our Mobile App</h6>
								</div>
								<div>
									<p class="text-secondary small-text">Download our mobile app to get
										instant
										access to the best trading experience</p>
								</div>
								<div class="row">
									<div class="col-md-6 col-6">
										<a href=""><img src="{{ asset('assets/images/google-play.png') }}" alt="" width="100%"></a>
									</div>
									<div class="col-md-6 col-6">
										<a href=""><img src="{{ asset('assets/images/app-store.png') }}" alt="" width="100%"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</section>
	@endsection


	@push('script')

    <script>

		const Rate = document.getElementById("rates-value");

		var buyRate = Rate.getAttribute('data-buyrate');
		var sellRate = Rate.getAttribute('data-sellrate');


        function validateInput(input) {
            // Remove any non-numeric characters and any multiple decimal points
            input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        }

        function buyCryptoAmountInNaira() {
            const cryptoValue = parseFloat(document.getElementById("buy_crypto_amount").value);

            if (!isNaN(cryptoValue)) {
                if (cryptoValue < 2) {
                    $('.minmum-usd').removeClass('d-none')
                }else{
                    $('.minmum-usd').addClass('d-none')

					let amountInNaira;
					amountInNaira = cryptoValue * buyRate;
                    document.getElementById("buy-sub-amount").innerText = "NGN " + parseFloat(amountInNaira).toLocaleString();
                }
            } else {
                document.getElementById("buy-sub-amount").innerText = "NGN 0";
            }
        }

		function sellCryptoAmountInNaira() {
            const cryptoValue = parseFloat(document.getElementById("sell_crypto_amount").value);

            if (!isNaN(cryptoValue)) {
                if (cryptoValue < 2) {
                    $('.minmum-usd').removeClass('d-none')
                }else{
                    $('.minmum-usd').addClass('d-none')

					let amountInNaira;
					amountInNaira = cryptoValue * sellRate;
                    document.getElementById("sell-sub-amount").innerText = "NGN " + parseFloat(amountInNaira).toLocaleString();
                }
            } else {
                document.getElementById("sell-sub-amount").innerText = "NGN 0";
            }
        }

    </script>

    @endpush

</x-app-layout>

<x-bottom-nav :page="$page" />
