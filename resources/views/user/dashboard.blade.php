<x-app-layout>

	@section('title', 'User Dashboard')

	@section('content')
	<!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

		<main class="body">
			<div class="body-top row">
				<div class="col-md-9">
					<div class="rate-section-row row">
						<p class="mobile-welcome-text">Welcome, <span>Exousia</span></p>
						<div class="rate-section col-md-4 mobile">
							<div class="dollar">
								<i class="fa fa-dollar"></i>
							</div>
							<div class="rate-section-container">
								<span>Total Tansactions</span>
								<h5 >&#8358; 10,250.00</h5>
							</div>
						</div>
						<div class="rate-section col-md-4 repo">
							<div class="rate-section-container">
								<span>Buying Rate</span>
								<h5>&#8358;  {{ number_format($general_setings->buy_rate, 2) }} </h5>
							</div>
						</div>
						<div class="rate-section col-md-4 repo">
							<div class="rate-section-container">
								<span>Selling Rate</span>
								<h5>&#8358;  {{ number_format($general_setings->sell_rate, 2) }}</h5>
							</div>
						</div>
					</div>
					<div class="rate-section-image">
						<h3>Image</h3>
					</div>
				</div>
				<div class="col-md-3 eth-mob">
					<div class="coin-section">
						<div class="coin-section-row row">
							<div class="col-md-4 col-4">
								<a href="">
									<div class="buy active text-white buyCoinBtn">Buy</div>
								</a>
							</div>
							<div class="col-md-4 col-4">
								<a href="">
									<div class="buy text-white sellCoinBtn">Sell</div>
								</a>
							</div>
							<div class="col-md-4 col-4">
								<a href="">
									<div class="buy text-white giftCardBtn">Giftcards</div>
								</a>
							</div>
						</div>
						<div class="coin-container">
							<form action="{{ route('buy.create') }}" method="get" class="buyCoin">
								<span><small>Coin</small></span>
								<select class="eth-input" name="cryptocurrency" onchange="showAmountInNaira('buy')">
									<option class="text-light" selected disabled>Select Cryptocurrency</option>
									<option class="text-light" value="1">Ethereum</option>
									<option class="text-light" value="1">Bitcoin</option>
									<option class="text-light">USDT</option>
									<option class="text-light">Notcoin</option>
									<option class="text-light">Tron</option>
									<option class="text-light">Doge Coin</option>
								</select>
								<span><small>Amount</small></span>
								<input type="number" hidden name="" id="buy-rate" value = {{ $general_setings->buy_rate }}>
								<input type="number" hidden name="" id="sell-rate" value = {{ $general_setings->sell_rate }}>
								
								<div class="input-group mt-2">
									<input type="text" class="form-control eth-input-group" id="crypto-amount" name="amount" value="{{ old('amount') }}" oninput="validateInput(this); showAmountInNaira('buy');">
									<span class="input-group-text">USD</span>
								</div>
								<div class="total pt-3">
									<p>Total</p>
									<p id="sub-amount">NGN 0</p>
								</div>
								<a href="buyingcoin.html"><input type="submit" class="btn btn-primary form-control"
										value="Buy"></a>
							</form>

							<form action="" method="post" class="sellCoin d-none">
								<span><small>Coin</small></span>
								<select class="eth-input" name="cryptocurrency" onchange="showAmountInNaira('buy')">
									<option class="text-light">Select Cryptocurrency</option>
									<option class="text-light">Ethereum</option>
									<option class="text-light">Bitcoin</option>
									<option class="text-light">USDT</option>
									<option class="text-light">Notcoin</option>
									<option class="text-light">Tron</option>
									<option class="text-light">Doge Coin</option>
								</select>
								<span><small>Amount</small></span>
								<div class="input-group mt-2">
									<input type="text" class="form-control eth-input-group">
									<span class="input-group-text">USD</span>
								</div>
								<div class="total pt-3">
									<p>Total</p>
									<p>NGN 401,342</p>
								</div>
								<a href="sellingcoin.html"><input type="submit" class="btn btn-primary form-control"
										value="Sell"></a>
							</form>

							<form action="" method="post" class="giftCard d-none">
								<span><small>Coin</small></span>
								<select class="eth-input" id="exampleFormControlSelect1">
									<option class="text-light">Select Giftcard</option>
									<option class="text-light">Apple Itunes</option>
									<option class="text-light">Razor Gold</option>
									<option class="text-light">Google Pay</option>
								</select>
								<span><small>Amount</small></span>
								<input type="number" hidden name="" id="buy-rate" value = {{ $general_setings->buy_rate }}>
								<input type="number" hidden name="" id="sell-rate" value = {{ $general_setings->sell_rate }}>
								<div class="input-group mt-2">
									<input type="text" class="form-control eth-input-group">
									<span class="input-group-text">USD</span>
								</div>
								<div class="total pt-3">
									<p>Total</p>
									<p>NGN 401,342</p>
								</div>
								<a href="giftcard.html"><input type="submit" class="btn btn-primary form-control"
										value="Sell Giftcards"></a>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="body-bottom row">
				<div class="col-md-9">
					<div class="history-section-row">
						<div class="history-section">
							<div class="header-history px-3">
								<p class="pt-2">Transaction History</p>

								<div class="more-container">
									<a href="transaction.html" class="text-white"><span>More Activity <i
												class="fa fa-angle-right"></i></span></a>
								</div>
							</div>
							<div class="table-section">
								<table class="table text-secondary table-borderless">
									<thead>
										<tr class="tr">
											<th class="transact">Transactions</th>
											<th>Amount</th>
											<th>Total</th>
											<th>Status</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
										<tr class="tr">
											<td class="transact"><span><img src="image/eth.png" alt=""
														width="50%"></span><span>Ethereum Purchased</span>
											</td>
											<td>0.0154ETH</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/btc.png" alt=""
														width="50%"></span><span>Bitcoin Purchased</span>
											</td>
											<td>0.0154BTC</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/eth.png" alt=""
														width="50%"></span><span>Ethereum Purchased</span>
											</td>
											<td>0.0154ETH</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/btc.png" alt=""
														width="50%"></span><span>Bitcoin Purchased</span>
											</td>
											<td>0.0154BTC</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/eth.png" alt=""
														width="50%"></span><span>Ethereum Purchased</span>
											</td>
											<td>0.0154ETH</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/btc.png" alt=""
														width="50%"></span><span>Bitcoin Purchased</span>
											</td>
											<td>0.0154BTC</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/eth.png" alt=""
														width="50%"></span><span>Ethereum Purchased</span>
											</td>
											<td>0.0154ETH</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/btc.png" alt=""
														width="50%"></span><span>Bitcoin Purchased</span>
											</td>
											<td>0.0154BTC</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/eth.png" alt=""
														width="50%"></span><span>Ethereum Purchased</span>
											</td>
											<td>0.0154ETH</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/eth.png" alt=""
														width="50%"></span><span>Ethereum Purchased</span>
											</td>
											<td>0.0154ETH</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/btc.png" alt=""
														width="50%"></span><span>Bitcoin Purchased</span>
											</td>
											<td>0.0154BTC</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
										<tr class="tr">
											<td class="transact"><span><img src="image/eth.png" alt=""
														width="50%"></span><span>Ethereum Purchased</span>
											</td>
											<td>0.0154ETH</td>
											<td>$1000</td>
											<td>Pending</td>
											<td>February 21, 2021</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="quick-action-section-row">
						<div class="quick-action-section">
							<div class="spacing">
								<div>
									<h6>Download Our Mobile App</h6>
								</div>
								<div>
									<p class="text-secondary small-text px-3">Download our mobile app to get
										instant
										access to the best trading experience</p>
								</div>
								<div class="row mx-1">
									<div class="col-md-6 col-6">
										<a href=""><img src="image/google-play.png" alt="" width="100%"></a>
									</div>
									<div class="col-md-6 col-6">
										<a href=""><img src="image/app-store.png" alt="" width="100%"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="quick-section-row mt-4">
						<div class="quick-section">
							<div>
								<p class="text-secondary"><small>Quick Actions</small>
								<div class="mt-4">
									<button class="btn btn-primary button"><i class="fa fa-square"></i>
										<a href="{{ route('buy.create') }}"
											class="text-white"><span>Buy-Crypto</span></a></button>
								</div>
								<div class="my-4">
									<button class="btn btn-light button text-primary"><i class="fa fa-square"></i>
										<a href="sellingcoin.html"
											class="text-primary"><span>Sell-Crypto</span></a></button>
								</div>
								<div>
									<button class="btn btn-success button"><i class="fa fa-square"></i>
										<a href="giftcard.html"
											class="text-white"><span>Trade-GiftCards</span></a></button>
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

        function validateInput(input) {
            // Remove any non-numeric characters and any multiple decimal points
            input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        }

        function showAmountInNaira(type) {
            const cryptoValue = parseFloat(document.getElementById("crypto-amount").value);
            const buyRate = parseFloat(document.getElementById("buy-rate").value);
            const sellRate = parseFloat(document.getElementById("sell-rate").value);

            if (!isNaN(cryptoValue)) {
                if (cryptoValue < 2) {    
                    $('.minmum-usd').removeClass('d-none')
                }else{
                    $('.minmum-usd').addClass('d-none')

					let amountInNaira;

					if (type == 'buy') {
						 amountInNaira = cryptoValue * buyRate;
					}else{
						amountInNaira = cryptoValue * sellRate
					}
                    document.getElementById("sub-amount").innerText = "NGN " + parseFloat(amountInNaira).toFixed(2);
                }
            } else {
                document.getElementById("sub-amount").innerText = "NGN 0";
            }
        }
    </script>

    @endpush

</x-app-layout>