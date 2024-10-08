<x-guest-layout>

    @section('title', 'Login')

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
                    <h4 class="text-center py-2">Welcome Back!</h4>
                    <p class="text-center signin-text">Sign in into your account</p>

                    <form action="{{ route('login.authenticate') }}" method="POST">
                        @csrf
                        <label for="Email Address" class="label-text">Email Address</label>
                        <div class="input">
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address" value="{{ old('email') }}">
                            <i class="fa fa-envelope text-secondary"></i>
                        </div>
                        <label for="Password" class="mt-3 label-text">Password</label>
                        <div class="input">
                            <input type="password" name="password" class="form-control password" placeholder="Enter Your Password">
                            <i class="fa fa-lock text-secondary"></i>

                            <i class="fa fa-eye text-secondary" onclick="showPassword()"></i>
                        </div>

                        <div class="">
                            <label for="" class="label-text">Remember me</label>
                            <input type="checkbox" class="form-check-input"  name="remember_me" value="1" style="margin-top: 12px; width: 14px; height: 14px;">
                        </div>

                        <a href="{{ route('forget.password') }}">
                            <p class="FP-link">Forgot Password? </p>
                        </a>
                        <div class="login-button text-center">
                            <Button class="form-control btn btn-primary">Login</Button>
                        </div>
                    </form>
                    <p class="text-center text-secondary below-text">New to Buyjet? <a href="{{ route('register') }}"><span
                                class="create-account">Create An Account</span></a>

                    <p class="text-center  text-secondary below-text">Have an Account? <a href="{{ route('login') }}"><span
                                    class="create-account">Login</span></a>
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-guest-layout>
