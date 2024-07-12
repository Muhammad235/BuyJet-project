<x-app-layout>

	@section('title', 'User Dashboard')

	@section('content')
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

		<div class="my-3"> 
            <div class="row justify-content-center">
                <div class="col-md-7 buy-coin-card col-11">
                    <div class="buy-coin-inner-card"> 
                        <div class="buy-coin-price">
                            Buying {{ @$cryptocurrency->name }} at {{ $general_setings->buy_rate }}/$
                        </div>
                        <div class="coin-container">
                            <form method="POST" action="{{ route('buy.store') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="coin-top">
                                    <span><small>Coin</small></span>

                                    <select class="eth-input" id="cryptocurrency_id" name="cryptocurrency_id" onchange="showAmountInNaira(); populateAssetNetworkOptions()">
										<option class="text-light" selected disabled>Select Cryptocurrency</option>

                                        @foreach ($cryptocurrencies as $cryptocurrency)
										<option class="text-light" @selected($cryptocurrency->id == $data['cryptocurrency_id']) value="{{ old('cryptocurrency', $cryptocurrency->id) }}">{{ $cryptocurrency->name }}</option>
									    @endforeach
									</select>

                                    <input type="text" hidden name="" id="rates-value" data-buyRate = {{ $general_setings->buy_rate }} data-sellRate = {{ $general_setings->buy_rate }}>

                                </div>
                                <div class="coin-top">
                                    <span><small>Select Network</small></span>

                                    <select name="asset_network" class="form-control" id="asset-network" disabled>
                                        <option value='' selected disabled>Select Asset Network</option>
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
                                <div class="amount mt-5">

                                <div class="charges">
                                    <p class="text-secondary"><i>Amount</i></p>
                                    <p class="text-secondary" id="amount"><i>0</i></p>
                                </div>
                                <div class="charges">
                                    <p class="text-secondary"><i>Charges</i></p>
                                    <p class="text-secondary" id="charge"><i>0</i></p>
                                </div>
                                <input type="text" hidden name="" id="charge-value" value="">
                            </div>
                                <div class="total">
                                    <p>Total</p>
                                    <p id="sub-amount">0</p>
                                </div>
           
                                <button type="button" class="btn btn-primary form-control"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Buy
                                </button>

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

        const Rate = document.getElementById("rates-value");
        var buyRate = Rate.getAttribute('data-buyrate');
        var sellRate = Rate.getAttribute('data-sellrate');


        function validateInput(input) {
            // Remove any non-numeric characters and any multiple decimal points
            input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        }

        function showAmountInNaira() {
            const cryptoValue = parseFloat(document.getElementById("crypto-amount").value);

            if (!isNaN(cryptoValue)) {

                if (cryptoValue < 2) {
                    
                    $('.minmum-usd').removeClass('d-none')
                }else{
                    $('.minmum-usd').addClass('d-none')

                    const amountInNaira = cryptoValue * buyRate;
                    document.getElementById("amount").innerText = "NGN " + parseFloat(amountInNaira).toFixed(2);

                    const chargeValue = parseFloat(document.getElementById("charge-value").value);

                    const Total = chargeValue + parseFloat(amountInNaira);
                    document.getElementById("sub-amount").innerText = "NGN " + parseFloat(Total).toFixed(3);
                }

            } else {
                document.getElementById("sub-amount").innerText = "NGN 0";
            }

            const assetList = document.getElementById('asset-network');
            assetList.removeAttribute('disabled');
        }

        showAmountInNaira()


        function populateAssetNetworkOptions() {

            const assetList = document.getElementById('asset-network');
            // assetList.removeAttribute('disabled');

            const selectedCrypto = document.getElementById('cryptocurrency_id').value;

            const assets = @json($cryptocurrencies);

            // Find the selected cryptocurrency
            const selectedCryptoObj = assets.find(crypto => crypto.id == selectedCrypto);


            // Clear existing options
            assetList.innerHTML = "<option value='' selected disabled>Select Asset Network</option>";

            
            if (selectedCryptoObj && selectedCryptoObj.assets !== null) {
                // Parse the assets JSON string into an array
                const assetArray = JSON.parse(selectedCryptoObj.assets);

                const selectedCryptoCharge = selectedCryptoObj.charge * buyRate;

                document.getElementById('charge').innerText = "NGN " + selectedCryptoCharge;
                document.getElementById('charge-value').value = selectedCryptoCharge;

                // Populate select options with asset networks
                assetArray.forEach((asset) => {
                    const option = document.createElement("option");
                    option.value = asset.assetname;
                    option.innerText = asset.assetname;
                    assetList.appendChild(option);
                });
            }
        }

        populateAssetNetworkOptions()

    </script>

    @endpush
@endsection

</x-app-layout>
