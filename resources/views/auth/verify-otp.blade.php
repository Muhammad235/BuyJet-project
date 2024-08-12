<x-guest-layout>

    @section('title', 'Verify OTP')

        <section class="login-section">
            <div class="d-none d-md-block">
                <img src="{{ asset('assets/images/left.png') }}" alt="" class="left">
                <img src="{{ asset('assets/images/right.png') }}" alt="" class="right">
            </div>
            <div class="d-block d-md-none">
                <img src="{{ asset('assets/images/login-up.png') }}" alt="" class="login-right">
                <img src="{{ asset('assets/images/login-down.png') }}" alt="" class="login-left">
            </div>
            <div class="container-fluid">
                <div class="row login-row">
                    <div class="wrapper">
                        <div class="containers shadow">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/buyjetLogo.png') }}" alt="" width="40%">

                                <p>check your mail for your otp</p>
                            </div>

                            <h4 class="text pt-2">Enter Your 4 Digit OTP</h4>

                            <form action="{{ route('verify.otp') }}" method="post" class="form">
                                @csrf
                                <div class="input_field_box">
                                    <input type="number" class="otp-input" name="otp1" />
                                    <input type="number" class="otp-input" name="otp2" disabled />
                                    <input type="number" class="otp-input" name="otp3" disabled />
                                    <input type="number" class="otp-input" name="otp4" disabled />
                                </div>

                                <button type="submit" disabled class="btn btn-primary text-light">Verify OTP</button>
                            </form>

                        </div>
                    </div>
                    <!-- <div class="col-md-6 side-image"></div> -->
                </div>
            </div>
        </section>
</x-guest-layout>
