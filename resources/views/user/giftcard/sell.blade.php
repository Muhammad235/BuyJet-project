<x-app-layout>

	@section('title', 'Payment successful')

	@section('content')
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
                    <img src="image/step1.png" alt="">
                </div>
                <div style="display: none;" class="steps">
                    <img src="image/step2.png" alt="">
                </div>
                <div style="display: none;" class="stepss">
                    <img src="image/step3.png" alt="">
                </div>

                <!-- <div class="steps">
                    <span class="circle activ">1</span>
                    <span class="circle circle_3">2</span>
                </div>
                <div class="progress-bar">
                    <span class="indicator active indicator_1"></span>
                    <span class="indicator indicator_3"></span>
                </div> -->
            </div>

            <div class="step_wrap">
                <div class="step_1">
                    <div class="row justify-content-center mt-5">
                        <div class="select-menu col-md-5">
                            <div class="select-btn">
                                <div>
                                    <img src="image/card.png" alt="">
                                    <span class="sBtn-text">Select Card</span>
                                </div>
                                <i class="bx bx-chevron-down chevron"></i>
                                <img src="image/check.png" alt="" class="check" style="display: none;">
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
                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/amazon.png" alt="" class="shadow">
                                                <h6 class="option-text">Amazon</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/steam.png" alt="" class="shadow">
                                                <h6 class="option-text">Steam</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/sephora.png" alt="" class="shadow">
                                                <h6 class="option-text">Sephora</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/apple iTunes.png" alt="" class="shadow">
                                                <h6 class="option-text">Apple iTunes</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/sephora.png" alt="" class="shadow">
                                                <h6 class="option-text">Sephora</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/apple iTunes.png" alt="" class="shadow">
                                                <h6 class="option-text">Apple iTunes</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/steam.png" alt="" class="shadow">
                                                <h6 class="option-text">Steam</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/apple iTunes.png" alt="" class="shadow">
                                                <h6 class="option-text">Apple iTunes</h6>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option">
                                                <img src="image/amazon.png" alt="" class="shadow">
                                                <h6 class="option-text">Amazon</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-2">
                        <div class="select-menu_currency col-md-5">
                            <div class="select-btn_currency">
                                <div>
                                    <img src="image/currency.png" alt="">
                                    <span class="sBtn-text_currency">Select Currency</span>
                                </div>
                                <i class="bx bx-chevron-down chevron_currency"></i>
                                <img src="image/check.png" alt="" class="check_currency" style="display: none;">
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
                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/usd.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">USD</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/cad.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">CAD</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/gbp.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">GBP</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/gbp.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">GBP</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/usd.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">USD</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/cad.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">CAD</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/cad.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">CAD</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/gbp.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">GBP</h5>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-4">
                                            <div class="option_currency">
                                                <img src="image/usd.png" alt="" class="shadow">
                                                <h5 class="option-text_currency">USD</h5>
                                            </div>
                                        </div>
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
                                    <input class="radio" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                        value="option1">
                                    <label class="form-check-label" for="inlineRadio1"><small>Physical
                                            Card</small></label>
                                </div>
                                <div class="form-check">
                                    <input class="radio" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                        value="option2">
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
                                    <input class="radio" type="radio" name="inlineRadioOption" id="inlineRadio3"
                                        value="option3">
                                    <label class="form-check-label" for="inlineRadio3"><small>No Receipt</small></label>
                                </div>
                                <div class="form-check">
                                    <input class="radio" type="radio" name="inlineRadioOption" id="inlineRadio4"
                                        value="option4">
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
                                    <input type="tel" class="card-input" placeholder="Enter Value">
                                </div>
                                <div class="counter">
                                    <button id="decrement-btn">-</button>
                                    <div id="counter-value">0</div>
                                    <button id="increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <div class="col-md-5 col-12 contd">
                            <small>Estimated Value: <b>₦90,4000 @814/$</b></small>
                            <button type="button" class="btn btn-next btnext">Continue</button>
                        </div>
                    </div>
                </div>

                <div class="step_2 pb-5" style="display: none;">
                    <div class="gift-section">
                        <div class="col-md-5 btn-continue col-12">
                            <!-- <div class="giftcard-upload shadow">
                                <img src="image/gift-image.png" alt="">
                            </div> -->
                            <div class="drop-section shadow">
                                <div class="col">
                                    <div class="cloud-icon">
                                        <img src="image/gift-image.png" alt="cloud" class="file-selector">
                                        <input type="file" class="file-selector-input" multiple hidden>
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
                            <div>
                                <button type="button" class="btn btn-gift" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Continue</button>
                            </div>
                        </div>
                        <div class="col-md-5 btn-dashboard col-12" style="display: none;">
                            <div>
                                <p>
                                    Confirmation takes approximately 5-30 minutes. <br> You will be notified as soon as
                                    your order has <br> been confirmed."
                                </p>
                            </div>
                            <div>
                                <a href="dashboard.html"><button type="button" class="btn btn-gift">Back to
                                        dashboard</button></a>
                            </div>
                        </div>
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
                        <img src="image/green.png" alt="" class="py-4">
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
@endsection

</x-app-layout>

{{ asset('assets/images/notify.png') }}