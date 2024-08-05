<x-app-layout>

	@section('title', 'Sell Giftcard')

	@section('content')

    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <main class="my-3 main">
            <h2 class="head-text">
                Sell Giftcards With Buyjet
            </h2>
            <div class="step-container">
                <div class="step">
                    <img src="{{ asset('assets/images/step3.png') }}" alt="">

                </div>
            </div>

            <div class="step_wrap">
                <div class="step_1">
                    <div class="row justify-content-center mt-5">
                    <p class="text-center pb-2">Select the card you will like to sell</p>

                        <div class="select-menu col-md-5">
                            <div class="select-btn">
                                <div>
                                    <img src="{{ asset('assets/images/card.png') }}" alt="">
                                    <span class="sBtn-text">Select Card</span>
                                </div>
                                <i class="bx bx-chevron-down chevron"></i>
                                <img src="{{ asset('assets/images/check.png') }}" alt="" class="check" style="display: none;">
                            </div>

                            <div class="options">
                                <form action="">
                                    <div class="input-search">
                                        <i class="fa fa-search"></i>
                                        <input type="search" class="form-control"
                                            placeholder="Search for giftcards by name" id="search-item"
                                            onkeyup="search()">
                                    </div>
                                </form>

                                <div class="pad">
                                    <div class="row justify-content-center" id="product-list">

                                    @if (count($giftcards) > 0)
                                        @foreach ($giftcards as $giftcard)
                                            <div class="col-md-4 col-4">
                                                <div class="option giftcard-option" data-giftcardid={{ $giftcard->id }} data-giftcardname={{ $giftcard->name }}>
                                                    <img src="{{ asset('assets/images/amazon.png') }}" alt="" class="shadow">
                                                    <h6 class="option-text">{{ $giftcard->name }}</h6>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                    @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-2">
                        <div class="select-menu_currency col-md-5">
                            <div class="select-btn_currency">
                                <div>
                                    <img src="{{ asset('assets/images/currency.png') }}" alt="">
                                    <span class="sBtn-text_currency">Select Currency</span>
                                </div>
                                <i class="bx bx-chevron-down chevron_currency"></i>
                                <img src="{{ asset('assets/images/check.png') }}" alt="" class="check_currency" style="display: none;">
                            </div>

                            <div class="options_currency">
                                <form action="">
                                    <div class="input-search_currency">
                                        <i class="fa fa-search"></i>
                                        <input type="search" class="form-control" placeholder="Search currency"
                                            id="search-item_currency" onkeyup="search_currency()">
                                    </div>
                                </form>

                                <div class="pad">
                                    <div class="row justify-content-center" id="product-list_currency">
                                        @if (count($currencies) > 0)
                                                @foreach ($currencies as $currency)
                                                <div class="col-md-4 col-4">
                                                    <div class="option_currency list_currency" data-currency={{ $currency->id }} data-currencyname={{ $currency->name }}>
                                                        <img src="{{ asset('assets/images/cad.png') }}" alt="" class="shadow">
                                                        <h5 class="option-text_currency">{{ $currency->name }}</h5>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @else
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-3">
                        <div class="col-md-5 card-type">
                            <span class="select-card"><small>Select Card Type</small></span>
                            <div class="radio-input">
                                <div class="form-check">
                                    <input class="radio" type="radio" name="is_physical_card" id="inlineRadio1"
                                        value="1">
                                    <label class="form-check-label" for="inlineRadio1"><small>
                                            Card</small></label>
                                </div>
                                <div class="form-check">
                                    <input class="radio" type="radio" name="is_physical_card" id="inlineRadio2"
                                        value="0">
                                    <label class="form-check-label" for="inlineRadio2"><small>E-code</small></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-md-5">
                            <small>Select Receipt Status</small>
                            <div class="radio-input">
                                <div class="form-check">
                                    <input class="radio" type="radio" name="with_receipt" id="inlineRadio3"
                                        value="1">
                                    <label class="form-check-label" for="inlineRadio3"><small>No Receipt</small></label>
                                </div>
                                <div class="form-check">
                                    <input class="radio" type="radio" name="with_receipt" id="inlineRadio4"
                                        value="0">
                                    <label class="form-check-label" for="inlineRadio4"><small>With
                                            Receipt</small></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-md-5">
                            <small>Enter Card Value</small>
                            <div class="count">
                                <div>

                                    <input type="text" class="card-input" id="card-value" value="{{ old('amount') }}" name="amount" oninput="validateInput(this); showAmountInNaira();" placeholder="Enter Value">

                                </div>
                                {{-- <div class="counter">
                                    <button id="decrement-btn">-</button>
                                    <div id="counter-value">0</div>
                                    <button id="increment-btn">+</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-md-5 col-12 contd" id="rate" data-sellrate="{{ $general_settings->sell_rate }}">
                            <small>Estimated Value: <b>₦<span id="estimated-amount" >0</span> @ {{ $general_settings->sell_rate }}/$</b></small> <br>
                            <button type="button" class="btn btn-next btnext" id="continue-btn">Continue</button>
                        </div>
                    </div>
                </div>

                <div class="step_2 pb-3" style="display: none;">
                    <p class="text-center">Summary of the giftcard you are about to sell</p>
                    <div class="gift-section">
                        <div class="col-md-5 btn-continue col-12">

                            {{-- <form action="" method="post"> --}}
                                <div class="drop-section shadow">
                                    <div class="col">
                                        <div class="cloud-icon">
                                            <img src="{{ asset('assets/images/gift-image.png') }}" alt="cloud" class="file-selector">
                                            <input type="file" name="payment_proof" class="file-selector-input" multiple hidden>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="drop-here">Drop Here</div>
                                    </div>
                                </div>

                                <div>
                                    {{-- <button type="button" class="btn btn-gift" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal" id="btn-giftcard">Continue</button> --}}

                                    <button type="submit" class="btn btn-gift" id="btn-giftcard">Continue</button>
                                </div>
                            {{-- </form> --}}
                        </div>
                        {{-- <div class="col-md-5 btn-dashboard col-12" style="display: none;">
                            <div>
                                <p>
                                    Confirmation takes approximately 5-30 minutes. <br> You will be notified as soon as
                                    your order has <br> been confirmed."
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('dashboard') }}"><button type="button" class="btn btn-gift">Back to
                                        dashboard</button></a>
                            </div>
                        </div> --}}


                        <div class="col-md-6 price-info shadow col-12">
                            <div class="row">
                                <div class="col-md-4 col-5">
                                    <div class="price-text">
                                        <span>Card</span>
                                        <h3 id="giftCard"></h3>
                                    </div>
                                    <div class="price-text-status price-text">
                                        <span>Receipt Status</span>
                                        <h3 id="receiptStatus"></h3>
                                    </div>
                                    <div class="price-text">
                                        <span>Total Amount Expected</span>
                                        <h3 id="amountExpected">0</h3>
                                    </div>
                                </div>
                                <div class="col-md-8 col-7">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4 price-text col-6">
                                            <span>Currency</span>
                                            <h3 id="currency"></h3>
                                        </div>
                                        <div class="col-md-4 price-text col-6">
                                            <span>Card Type</span>
                                            <h3 id="cardType"></h3>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center price-text-status">
                                        <div class="col-md-4 price-text col-6">
                                            <span>Volume</span>
                                            <h3 id="amountIndollar">$0</h3>
                                        </div>
                                        <div class="col-md-4 price-text col-6">
                                            <span>Rate</span>
                                            <h3>₦{{ $general_settings->sell_rate }}/$</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>


        <!-- Modal -->
        <div class="modal fade modal-error" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content error bg-white">
                    <div class="text-center pt-4 pb-2">
                        <h5 class="modal-title text-dark text-center" id="exampleModalLabel">Please read the
                            instructions below</h5>
                    </div>
                    <div class="modal-body text-secondary text-center">
                        <p class="pb-1"><small>Ensure you upload clear image of your Gift card, and of the <br> receipt.
                                <br></small> </p>

                        <p class="pb-2"><small>Make sure you upload the receipt, if you selected the “with Receipt”
                                option <br>
                                to avoid order cancellation. <br></small></p>


                        <p class="pb-1"><small>Opening orders without uploading Gift cards is not allowed.</small></p>

                        <p class="pb-2"><small>Failure to comply with the above stated terms may lead to <br>
                                limitations on your Buyjet account and total loss of paid <br> amount.</small></p>
                        <div class="modal-check">
                            <input type="checkbox" id="checkbox">
                            <label for="checkbox"></label>
                            <span class="pr-5"><small>I agree to the instructions above and want to proceed to
                                    the payment window.</small></span>
                        </div>
                    </div>
                    <div class="modalfooter my-4">
                        <!-- <button type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Continue</button> -->

                        <button type="button" class="btn btn-primary cont" data-bs-toggle="modal"
                            data-bs-target="#exampleModall">Continue</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modal-complete" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabell"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content error bg-white">
                    <div class="modal-body text-center">
                        <img src="{{ asset('assets/images/green.png') }}" alt="" class="py-4">
                        <h4 class="py-2">GiftCard Confirmed</h4>
                        <p>Payout takes approximately 2 -5 minutes. <br> Payout will be disbursed to default account</p>
                    </div>
                    <div class="modalfooter mb-5">
                        <a href="dashboard.html"><button type="button" class="btn btn-primary">Back to
                                Dashboard</button></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('script')

    <script>

        // Swal.fire({
        //     text: "Here's a basic example of SweetAlert!",
        //     icon: "error",
        //     buttonsStyling: false,
        //     confirmButtonText: "Ok, got it!",
        //     customClass: {
        //         confirmButton: "btn btn-primary"
        //     }
        // });

        function validateInput(input) {
            // Remove any non-numeric characters and multiple decimal points
            input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
        }

        function showAmountInNaira() {
            const rateElement = document.getElementById('rate');
            const sellRate = parseFloat(rateElement.getAttribute('data-sellrate'));

            // const amountInput = document.getElementById('card-value');
            const amountValue = parseFloat(document.getElementById('card-value').value);

            const amountExpected = $("#amountExpected");
            const estimatedAmountElement = document.getElementById('estimated-amount');

            if (!isNaN(amountValue)) {

                if (!isNaN(sellRate) && !isNaN(amountValue)) {
                    const amountInNaira = sellRate * amountValue;

                    estimatedAmountElement.textContent = amountInNaira.toFixed(2);
                    amountExpected.text(`₦${amountInNaira.toFixed(2)}`);

                } else {
                    estimatedAmountElement.textContent = '0';
                }

                return;
            }
            amountExpected.text("0");
        }


        $(document).ready(function() {

            const next_step_1 = document.querySelector(".btnext");
            const next_step_2 = document.querySelector(".next_step_2");

            var selectedCurrencyId;
            var selectedCurrencyName;
            var selectedGiftCardId;
            var selectedGiftCardName;
            var isPhysicalCard;
            var selectedReceiptStatus;


            $(".giftcard-option").on("click", function() {
                selectedGiftCardId = $(this).data('giftcardid');
                selectedGiftCardName = $(this).data('giftcardname');
            });

            $(".list_currency").on("click", function() {
                selectedCurrencyId = $(this).data('currency');
                selectedCurrencyName = $(this).data('currencyname');
            });

            $('input[name="is_physical_card"]').on("change", function() {
                isPhysicalCard = $(this).val();
            });

            $('input[name="with_receipt"]').on("change", function() {
                selectedReceiptStatus = $(this).val();
            });


            $("#continue-btn").on("click", function() {
                // var cardInputValue = $(".card-input").val();
                var data = {
                    selectedCurrencyId: selectedCurrencyId,
                    selectedGiftCardId: selectedGiftCardId,
                    isPhysicalCard: isPhysicalCard,
                    withReceipt: selectedReceiptStatus,
                    selectedCurrencyName: selectedCurrencyName,
                    selectedGiftCardName: selectedGiftCardName,
                };

                // Check if any of the data values are empty

                // if (!data.selectedCurrencyId || !data.selectedGiftCardId || data.isPhysicalCard === undefined || data.withReceipt === undefined || !data.selectedCurrencyName || !data.selectedGiftCardName) {
                //     Swal.fire({
                //         text: "You must fill all data about your giftcard, before you proceed!",
                //         icon: "error",
                //         buttonsStyling: false,
                //         confirmButtonText: "Ok",
                //         customClass: {
                //             confirmButton: "btn btn-primary"
                //         }
                //     });

                // } else {

                    next_step_1.addEventListener("click", function () {
                      step_1.style.display = "none";
                      step_2.style.display = "block";

                      step.style.display = "none";
                    });

                    processCollectedData(data);
                // }

            });


            function processCollectedData(data) {
                $("#giftCard").text(data.selectedGiftCardName);
                $("#currency").text(data.selectedCurrencyName);

                if(data.isPhysicalCard == 0){
                    $("#cardType").text("E-code");
                } else {
                    $("#cardType").text("Physical");
                }

                if(data.withReceipt == 0){
                    $("#receiptStatus").text("With Receipt");
                } else {
                    $("#receiptStatus").text("No Receipt");
                }

                var cardValue = parseFloat($("#card-value").val());

                if(!isNaN(cardValue)){
                    $("#amountIndollar").text(`$${cardValue}`);
                }
            }

            var fileName;
            var maxFileSize = 4 * 1024 * 1024; // 4MB in bytes

            $('input[name="payment_proof"]').on('change', function(event) {
                let files = event.target.files;
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    if (!file.type.startsWith('image/')) {
                            Swal.fire({
                                text: 'File ' + file.name + ' is not an image!',
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Upload again!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        return;
                    }
                    if (file.size > maxFileSize) {
                        Swal.fire({
                                text: 'File ' + file.name + ' exceeds the 4MB size limit.!',
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Upload again!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        return;
                    }
                    fileName = file.name;
                }
            });


            $('#btn-giftcard').on('click', function() {

                var data = {
                    selectedCurrencyId: selectedCurrencyId,
                    selectedGiftCardId: selectedGiftCardId,
                    isPhysicalCard: isPhysicalCard,
                    withReceipt: selectedReceiptStatus,
                    proof_payment: fileName,
                    '_token': '{{ csrf_token() }}'
                }

                $.ajax({
                    url: "{{ route('giftcard.store') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        console.log('Success:', response);
                    },
                    error: function(error) {
                        console.error('Error:', error);
                    }
                });

            });


        });

    </script>

@endpush

@endsection
</x-app-layout>
