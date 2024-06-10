<x-app-layout>

	@section('title', 'User Dashboard')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav class="navbar">
			<p class="welcome-text">Welcome, <span>Exousia</span></p>
			<div class="contain">
				<img src="image/notify.png" alt="" width="30px">
				<div class="profile">
					<img src="image/people.png" width="30px">
					<p class="text-white pt-2"><small>Exousia Matt</small></p>
				</div>
			</div>
			<div class="hamburger">
				<a href="dashboard.html"><div class="logo">
					<img src="image/Logo.png" alt="">
					<span class="text-white">Buyjet</span>
				</div></a>
				<i class='bx bx-menu stripe text-white'></i>
			</div>
		</nav>

		<div class="my-3"> 
            <div class="row justify-content-center">
                <div class="col-md-7 buy-coin-card col-11">
                    <div class="buy-coin-inner-card"> 
                        <div class="buy-coin-price">
                            Buying Eth at {{ $general_setings->buy_rate }}/$
                        </div>
                        <div class="coin-container">
                            <form method="POST" action="{{ route('buy.store') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="coin-top">
                                    <span><small>Coin</small></span>
                                    <select class="eth-input" name="cryptocurrency_id" onchange="showAmountInNaira()">
										<option class="text-light" selected disabled>Select Cryptocurrency</option>
										<option class="text-light" value="1">Ethereum</option>
										<option class="text-light" value="2">Bitcoin</option>
										<option class="text-light">USDT</option>
										<option class="text-light">Notcoin</option>
										<option class="text-light">Tron</option>
										<option class="text-light">Doge Coin</option>
									</select>

                                    {{-- <input type="text" name="" id="rates-value" data-buyRate = {{ $general_setings->buy_rate }} data-sellRate = {{ $general_setings->buy_rate }}> --}}
                                    <input type="number" hidden name="" id="buy-rate" value = {{ $general_setings->buy_rate }}>
                                    <input type="number" hidden name="" id="sell-rate" value = {{ $general_setings->sell_rate }}>
                                </div>
                                <div class="coin-top">
                                    <span><small>Select Network</small></span>
									<select class=" eth-input">
										<option class="text-light">ERC20</option>
										<option class="text-light">TRC20</option>
									</select>
                                </div>
                                <div class="coin-top">
                                    <span><small>Wallet Address</small></span>
                                    <input placeholder="Enter Your Wallet Address"
                                        class="form-control eth-input" name="wallet_address" value="{{ old('wallet_address') }}">
                                </div>
                                <div class="coin-top">
                                    <span><small>Amount in USD</small></span>
                                    <span class="text-danger d-none minmum-usd">You can purchase within $2 to $50,000</span>
                                    <div class="input-group mt-2">
										<input type="text" class="form-control eth-input-group" id="crypto-amount" value="{{ $data['amount'] ?? '' }}" name="amount" oninput="validateInput(this); showAmountInNaira();">
										<span class="input-group-text">USD</span>
									</div>
                                </div>
                                <div class="charges">
                                    <p class="text-secondary"><i>Charges</i></p>
                                    <p class="text-secondary"><i>NGN 1,342</i></p>
                                </div>
                                <div class="total">
                                    <p>Total</p>
                                    <p id="sub-amount">0</p>
                                </div>
           
                                <button type="button" class="btn btn-primary form-control"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Buy
                                </button>

                                {{-- <button type="submit">Buy</button> --}}

                                <!-- Modal -->
                                <div class="modal fade modal-background" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-white" id="exampleModalLabel">Please read the instructions below</h5>
                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="paragraph">
                                                <p>Please note that due to price fluctuations, there may be a slight difference between the
                                                    amount you receive and the estimated amount.</p>
                                
                                                <p>Screenshot is compulsory and only Screenshots from payment app is accepted..</p>
                                
                                                <p>Opening orders without making payment is not allowed.
                                                    Failure to comply with the above stated terms leads to limitation on your {{ config('app.name') }} account and
                                                    total loss of paid amount.</p>
                                            </div>
                                            <div>
                                                <input type="checkbox" name="agree" value="true" required>
                                                <span class="pr-5 text-white"><small>I agree to the instructions above and want to proceed to the payment window.</small></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                        <button type="submit" class="btn btn-primary">Continue to make payment</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
        
	</section>


    @push('script')
        
    <script>

        function validateInput(input) {
            // Remove any non-numeric characters and any multiple decimal points
            input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        }

        function showAmountInNaira() {
            const cryptoValue = parseFloat(document.getElementById("crypto-amount").value);
            // const Rate = parseFloat(document.getElementById("rates-value"));
            const buyRate = parseFloat(document.getElementById("buy-rate").value);
            const sellRate = parseFloat(document.getElementById("sell-rate").value);

            // var buyRate = Rate.getAttribute('data-buyrate');
            // var sellRate = Rate.getAttribute('data-sellrate');

            if (!isNaN(cryptoValue)) {

                if (cryptoValue < 2) {
                    
                    $('.minmum-usd').removeClass('d-none')
                }else{
                    $('.minmum-usd').addClass('d-none')

                    const amountInNaira = cryptoValue * buyRate;
                    document.getElementById("sub-amount").innerText = "NGN " + parseFloat(amountInNaira).toFixed(2);
                }

            } else {
                document.getElementById("sub-amount").innerText = "NGN 0";
            }
        }

        showAmountInNaira()

    </script>

    @endpush

@endsection
</x-app-layout>
