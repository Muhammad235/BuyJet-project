<x-guest-layout>

    @section('title', 'Forget password')

    <style>
        .input {
            margin-bottom: -5.5px;
        }
    </style>

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
                <div class="card m-auto shadow">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/logo_dark.svg') }}" alt="" width="30%">
                    </div>
                    <h4 class="text-center py-2">We have your back!</h4>
                    <p class="text-center signin-text">Enter your email below</p>

                    <form action="{{ route('reset.password') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="New Password" class="label-text">New Password</label>
                        <div class="input">
                            <input type="password" name="password" class="form-control" placeholder="Enter Your New Password" value="{{ old('password') }}">
                            <i class="fa fa-envelope text-secondary"></i>
                        </div>

                        <label for="Confirm Password" class="label-text">Confirm Password</label>
                        <div class="input">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Your Password" value="{{ old('password_confirmation') }}">
                            <i class="fa fa-envelope text-secondary"></i>
                        </div>

                        <div class="login-button text-center">
                            <input type="submit" class="form-control btn btn-primary"
                                    value="Submit">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
