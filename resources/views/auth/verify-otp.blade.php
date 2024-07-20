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
                            </div>

                            <h4 class="text pt-4">Enter Your 4 Digit OTP</h4>

                            <form action="{{ route('verify.otp') }}" method="post" class="form">
                                @csrf
                                <div class="input_field_box">
                                    <input type="number" />
                                    {{-- <input type="number" disabled />
                                    <input type="number" disabled />
                                    <input type="number" disabled /> --}}
                                </div>

                                <button type="submit" class="btn btn-primary text-light">Verify OTP</button>
                            </form>

                        </div>
                    </div>
                    <!-- <div class="col-md-6 side-image"></div> -->
                </div>
            </div>
        </section>
</x-guest-layout>
