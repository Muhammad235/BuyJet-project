use App\Http\Requests\User\BuyCryptoRequest;
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
                            <form action="">
                                <div class="coin-top">
                                    <span><small>Coin</small></span>
                                    <select class="eth-input" name="cryptocurrency_id">
										<option class="text-light" selected disabled>Select Cryptocurrency</option>
										<option class="text-light">Ethereum</option>
										<option class="text-light">Bitcoin</option>
										<option class="text-light">USDT</option>
										<option class="text-light">Notcoin</option>
										<option class="text-light">Tron</option>
										<option class="text-light">Doge Coin</option>
									</select>
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
                                        class="form-control eth-input" name="wallet_address">
                                </div>
                                <div class="coin-top">
                                    <span><small>Amount</small></span>
                                    <div class="input-group mt-2">
										<input type="text" class="form-control eth-input-group" value="{{ $data['amount'] }}">
										<span class="input-group-text">USD</span>
									</div>
                                </div>
                                <div class="charges">
                                    <p class="text-secondary"><i>Charges</i></p>
                                    <p class="text-secondary"><i>NGN 1,342</i></p>
                                </div>
                                <div class="total">
                                    <p>Total</p>
                                    <p>NGN 401,342</p>
                                </div>
           
                                <button type="button" class="btn btn-primary form-control"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Buy
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
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
                            Failure to comply with the above stated terms leads to limitation on your Buyjet account and
                            total loss of paid amount.</p>
                    </div>
                    <div>
                        <input type="checkbox">
                        <span class="pr-5 text-white"><small>I agree to the instructions above and want to proceed to the payment window.</small></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                   <a href="transferCoin.html"><button type="button" class="btn btn-primary">Continue to make payment</button></a> 
                </div>
            </div>
        </div>
        </div>
        
	</section>
    @endsection

</x-app-layout>