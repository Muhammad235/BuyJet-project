<x-app-layout>

	@section('title', 'Sell Giftcard')

	@section('content')
    <style>
        .div.toast-message{
            background-color: red !important;
        }
        .div.toast.toast-succes{
            background-color: red !important;
            color: green !important;
        }
    </style>
    <!-- CONTENT -->
	<section id="content">
		<!-- TOP NAVBAR -->
        <x-top-navbar :user="$user" />

        <main class="my-3 main">
            <h2 class="head-text">
                Sell Giftcards With Buyjet
            </h2>
            <p class="sub-head-text"><small>Select the card you will like to sell</small></p>
            <div class="step-container">
                <div class="step">
                    <img src="{{ asset('assets/images/step3.png') }}" alt="">

                </div>
            </div>

            {{-- <input type="text" id="" data-sellRate="{{ $general_settings->sell_rate }}" hidden> --}}

            <div class="step_wrap">
                <div class="step_1">
                    <div class="row justify-content-center mt-5">
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
                                                <div class="option giftcard-option" data-giftcardid={{ $giftcard->id }}>
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
                                                    <div class="option_currency list_currency" data-currency={{ $currency->id }}>
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
                                    <label class="form-check-label" for="inlineRadio1"><small>Physical
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
                                    <input type="text" class="card-input" id="card-value" oninput="validateInput(this); showAmountInNaira();" placeholder="Enter Value">
                                </div>
                                {{-- <div class="counter">
                                    <button id="decrement-btn">-</button>
                                    <div id="counter-value">0</div>
                                    <button id="increment-btn">+</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-5 col-12 contd" id="rate" data-sellrate="{{ $general_settings->sell_rate }}">
                            <small>Estimated Value: <b>₦<span id="estimated-amount" >0</span> @ {{ $general_settings->sell_rate }}/$</b></small>
                            <button type="button" class="btn btn-next btnext" id="continue-btn">Continue</button>
                        </div>
                    </div>
                </div>

                <div class="step_2 pb-5" style="display: none;">
                    <div class="gift-section">
                        <div class="col-md-5 btn-continue col-12">
                            <div class="drop-section shadow">
                                <div class="col">
                                    <div class="cloud-icon">
                                        <img src="{{ asset('assets/images/gift-image.png') }}" alt="cloud" class="file-selector">
                                        <input type="file" class="file-selector-input" multiple hidden>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="drop-here">Drop Here</div>
                                </div>
                            </div>

                            <div>
                                <button type="button" class="btn btn-gift" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Continue</button>
                            </div>
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
                                        <h3>Apple Itunes</h3>
                                    </div>
                                    <div class="price-text-status price-text">
                                        <span>Receipt Status</span>
                                        <h3>With Receipt</h3>
                                    </div>
                                    <div class="price-text">
                                        <span>Total Amount Expected</span>
                                        <h3>₦ 102,000</h3>
                                    </div>
                                </div>
                                <div class="col-md-8 col-7">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4 price-text col-6">
                                            <span>Currency</span>
                                            <h3>USA</h3>
                                        </div>
                                        <div class="col-md-4 price-text col-6">
                                            <span>Card Type</span>
                                            <h3>Physical</h3>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center price-text-status">
                                        <div class="col-md-4 price-text col-6">
                                            <span>Volume</span>
                                            <h3>$10 <span><small>xl</small></span></h3>
                                        </div>
                                        <div class="col-md-4 price-text col-6">
                                            <span>Rate</span>
                                            <h3>₦ 814/$</h3>
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

        function validateInput(input) {
            // Remove any non-numeric characters and any multiple decimal points
            input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        }

        function showAmountInNaira() {
            const rateElement = document.getElementById('rate');
            const sellRate = parseFloat(rateElement.getAttribute('data-sellrate'));

            const amountInput = document.getElementById('card-value');
            const amountValue = parseFloat(amountInput.value);

            const estimatedAmountElement = document.getElementById('estimated-amount');

            if (!isNaN(sellRate) && !isNaN(amountValue)) {
                const estimatedAmount = sellRate * amountValue;
                estimatedAmountElement.textContent = estimatedAmount.toFixed(2); // Displaying the estimated value with two decimal places
            } else {
                estimatedAmountElement.textContent = '0';
            }
        }


        $(document).ready(function() {
            var selectedCurrency;
            var selectedGiftCardId;
            var isPhysicalCard;
            var selectedReceiptStatus;
            var cardValue;

            $(".giftcard-option").on("click", function() {
                selectedGiftCardId = $(this).data('giftcardid');
            });

            $(".list_currency").on("click", function() {
                selectedCurrency = $(this).data('currency');
            });

            $('input[name="is_physical_card"]').on("change", function() {
                isPhysicalCard = $(this).val();
            });

            $('input[name="with_receipt"]').on("change", function() {
                selectedReceiptStatus = $(this).val();
            });


            $("#continue-btn").on("click", function() {
                var cardInputValue = $(".card-input").val();
                var data = {
                    selectedCurrency: selectedCurrency,
                    selectedGiftCardId: selectedGiftCardId,
                    isPhysicalCard: isPhysicalCard,
                    withReceipt: selectedReceiptStatus,
                    cardValue: cardInputValue || cardValue
                };
                processCollectedData(data);
            });
        });

        function processCollectedData(data) {
            console.log('Collected Data:', data);
            // Add your processing logic here
        }




        // toastr.info('Are you the 6 fingered man?')
        //     toastr.error('Are you the 6 fingered man?')
        //     toastr.success('success?')
            // $("#increment-btn").on("click", function() {
            //     var counterValue = parseInt($("#counter-value").text());
            //     counterValue++;
            //     $("#counter-value").text(counterValue);
            //     cardValue = counterValue;
            // });

            // $("#decrement-btn").on("click", function() {
            //     var counterValue = parseInt($("#counter-value").text());
            //     if (counterValue > 0) {
            //         counterValue--;
            //         $("#counter-value").text(counterValue);
            //         cardValue = counterValue;
            //     }
            // });
    </script>

@endpush

@endsection
</x-app-layout>
