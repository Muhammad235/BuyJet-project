<x-guest-layout>

    @section('title', 'Register')

    <div class="col-md-6">
        <div class="card-sign-up">
            <div class="text-head">
                <div class="text-center login-img mb-5">
                    <img src="image/buyjetLogo.png" alt="">
                </div>
                <h4 class="text-center">Sign Up</h4>
                <p class="text-center">Create An Accont</p>

                <form action="" class="signup-form">
                    <label for="First Name" class="label-text">First Name</label>
                    <div class="input">
                        <input type="text" class="form-control" placeholder="Enter Your First Name">
                        <i class="fa fa-envelope text-secondary"></i>
                    </div>

                    <label for="Last Name" class="label-text">Last Name</label>
                    <div class="input">
                        <input type="text" class="form-control" placeholder="Enter Your Last Name">
                        <i class="fa fa-envelope text-secondary"></i>
                    </div>

                    <label for="Email Address" class="label-text">Email Address</label>
                    <div class="input">
                        <input type="email" class="form-control" placeholder="Enter Your Email Address">
                        <i class="fa fa-envelope text-secondary"></i>
                    </div>

                    <label for="Phone Number" class="label-text">Phone Number</label>
                    <div class="input">
                        <input type="number" class="form-control" placeholder="Enter Your Phone Number">
                        <i class="fa fa-phone text-secondary"></i>
                    </div>

                    <label for="Password" class="label-text">Password</label>
                    <div class="input">
                        <input type="password" class="form-control password" placeholder="Enter Your Password">
                        <i class="fa fa-lock text-secondary"></i>
                        <i class="fa fa-eye text-secondary" onclick="showPassword()"></i>
                    </div>

                    <label for="Confirm Password" class="label-text">Confirm Password</label>
                    <div class="input">
                        <input type="password" class="form-control confPassword" placeholder="Enter Your Password Again">
                        <i class="fa fa-lock text-secondary"></i>
                        <i class="fa fa-eye text-secondary" onclick="showPassword2()"></i>
                    </div>


                    <div class="signup-button">
                        <a href="dashboard.html"><input type="submi" class="form-control btn btn-primary" value="Sign Up"></a>
                    </div>
                </form>
                <p class="text-center  text-secondary below-text">Have an Account? <a
                            href="login.html"><span class="create-account">Login</span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-6 side-image"></div>
</x-guest-layout>