<x-guest-layout>

    @section('title', 'Verify OTP')

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow: hidden !important;
    }
    ::-webkit-scrollbar {
        width: 15px;
    }

    ::-webkit-scrollbar-track {
        background-color: #e1e9ff;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #181628;
        border-radius: 10px;
        border: 4px solid transparent;
        background-clip: content-box;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #181628;
    }
    a {
        color: white !important;
    }
    .containers {
        width: 300px;
        height: auto;
        padding: 10px 30px 40px 30px;
        background-color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-radius: 15px;
        margin: auto;
    }

    .text {
        font-size: 18px;
        color: #121212;
    }

    .form {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 20px;
    }

    .input_field_box {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
    }

    .input_field_box input {
        border: none;
        max-width: 20%;
        height: 60px;
        text-align: center;
        border-radius: 5px;
        background: #f0f0f0;
        font-size: 25px;
    }

    .input_field_box input::-webkit-inner-spin-button,
    .input_field_box input::-webkit-outer-spin-button {
        display: none;
    }

    .input_field_box input:focus {
        outline: 1.5px solid #00b991;
        outline-offset: 2px;
    }

    form button {
        margin-top: 25px;
        width: 92%;
        color: #525252;
        font-size: 16px;
        padding: 10px 0;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        pointer-events: none;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    form button.active {
        background: #ffcc00;
        pointer-events: auto;
        color: #000000;
    }
    form button:hover {
        background: #e6b801;
    }
    .login-section {
        display: flex;
        justify-content: center;
        margin: auto;
        height: 100vh;
        align-items: center;
    }

    @media (min-width: 280px) and (max-width: 575px) {
        .login-section {
        padding-top: 100px;
        align-items: start;
        background: linear-gradient(
            180deg,
            #999999 29.97%,
            #e0e0e0 70%,
        );
        }
        .triangle{
        display: none;
        }
    }

    </style>

        <section class="login-section">
            <div class="d-none d-md-block triangle">
                <img src="{{ asset('assets/images/left.png') }}" alt="" class="left">
                <img src="{{ asset('assets/images/right.png') }}" alt="" class="right">
            </div>
            <div class="d-block d-md-none">
                <img src="{{ asset('assets/images/login-up.png') }}" alt="" class="login-right">
                <img src="{{ asset('assets/images/login-down.png') }}" alt="" class="login-left">
            </div>
            <div class="container-fluid">
                <div class="row otp-row">
                    <div class="wrapper">
                        <div class="containers shadow">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/logo_dark.svg') }}" class="mb-1" alt="" width="40%">

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

                                <button type="submit" class="btn btn-primary text-light">Verify OTP</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-guest-layout>
