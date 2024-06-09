<x-guest-layout>

    @section('title', 'Login')

    <div class="col-md-6">
        <div class="card-login">
            <div>
                <div class="text-center mb-5 login-img">
                    <img src="image/buyjetLogo.png" alt="">
                </div>
                <h4 class="text-center">Welcome Back!</h4>
                <p class="text-center">Sign in into your account</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <label for="Email Address" class="label-text">Email Address</label>
                    <div class="input">
                        <input type="email" class="form-control" placeholder="Enter Your Email Address" name="email" value="{{ old('email') }}">
                        <i class="fa fa-envelope text-secondary"></i>
                    </div>
                    <label for="Password" class="mt-3 label-text">Password</label>
                    <div class="input">
                        <input type="password" class="form-control password" name="password"
                            placeholder="Enter Your Password">
                        <i class="fa fa-lock text-secondary"></i>

                        <i class="fa fa-eye text-secondary" onclick="showPassword()"></i>
                    </div>

                    <a href="#">
                        <p class="FP-link">Forgot Password?</p>
                    </a>
                    <div class="login-button">
                        <input type="submit" class="form-control btn btn-primary"
                                value="Login">

                    </div>
                </form>
                <p class="text-center  text-secondary below-text">New to Buyjet? <a href="{{ route('register') }}"><span class="create-account">Create An Account</span></a>
                </p>
            </div> 
        </div>
    </div>
    <div class="col-md-6 side-image"></div>
</x-guest-layout>
