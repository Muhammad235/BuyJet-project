<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuyJet Login</title>

    {{-- App favicon --}}
    <link rel="icon" href="{{ asset('assets/images/Logo.png') }}">
	{{-- <link rel="stylesheet" href="styles/bottomnav.css">
    <link rel="stylesheet" href="styles/sign.css"> --}}

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  ::-webkit-scrollbar{
    width: 15px;
  }

  ::-webkit-scrollbar-track{
    background-color: #E1E9FF;
  }

  ::-webkit-scrollbar-thumb{
    background-color: #181628;
    border-radius: 10px;
    border: 4px solid transparent;
    background-clip: content-box;
  }

  ::-webkit-scrollbar-thumb:hover{
    background-color: #181628;
  }


  a {
    text-decoration: none !important;
    color: #000 !important;
  }

  .login-section{
    height: 100%;
    position: relative !important;
    background: linear-gradient(180deg, #FFFFFF 0%, #E0E0E0 29.97%, #999999 100%);
  }
  .right{
    position: absolute !important;
    bottom: 0 !important;
    width: 49%;
    right: 0;
  }
  .left{
    position: absolute !important;
    bottom: 0 !important;
    width: 28%;
    left: 0;
  }
  .login-row{
    height: 100%;
    display: flex;
    justify-content: center;
  }
  .signin-text{
    color: #9E9E9E;
  }
  .card{
    border: none !important;
    padding: 30px !important;
    width: 27% !important;
    border-radius: 10px !important;
    margin-top: 50px !important;
    margin-bottom: 50px !important;
  }
  form{
    margin-top: 20px;
  }
  .label-text {
    color: #110e22;
    font-size: 13px;
    margin-top: 10px;
  }
  ::placeholder {
    font-size: 10px;
    color: #9e9e9e !important;
  }
  input[type='email']{
    padding-left: 40px !important;
    padding-right: 40px !important;
    background: transparent !important;
    border: 1px solid rgba(0, 0, 0, 0.315) !important;
    width: 100% !important;
    margin-bottom: 10px;
  }
  input[type='password']{
    padding-left: 40px !important;
    padding-right: 40px !important;
    background: transparent !important;
    border: 1px solid rgba(0, 0, 0, 0.315) !important;
    width: 100% !important;
    margin-bottom: 10px;
  }
  input[type='text']{
    padding-left: 40px !important;
    padding-right: 40px !important;
    background: transparent !important;
    border: 1px solid rgba(0, 0, 0, 0.315) !important;
    width: 100% !important;
    margin-bottom: 10px;
  }
  input[type='tel']{
    padding-left: 40px !important;
    padding-right: 40px !important;
    background: transparent !important;
    border: 1px solid rgba(0, 0, 0, 0.315) !important;
    width: 100% !important;
    margin-bottom: 10px;
  }
  .FP-link {
    color: #0772fb;
    padding-top: 5px;
    font-size: 10px;
  }
  .login-button {
    margin-top: 40px;
  }
  .signup-button {
    margin-top: 30px;
  }
  .create-account {
    color: #0772fb;
  }
  .fa-envelope {
    position: absolute;
    top: 15px;
    left: 15px;
    font-size: 13px;
  }
  .fa-phone {
    position: absolute;
    top: 15px;
    left: 15px;
    font-size: 13px;
  }
  .fa-lock {
    position: absolute;
    top: 15px;
    left: 15px;
    font-size: 13px;
  }
  .fa-eye {
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
    font-size: 13px;
  }
  .input {
    position: relative;
  }
  input:focus {
    box-shadow: none !important;
    border-color: #9e9e9e !important;
  }
  .below-text{
    font-size: 11px;
    padding-top: 5px;
  }
  input[type='submit']{
    width: 300px !important;
    height: 40px !important;
    font-size: 12px;
  }
  .text-head{
    margin-top: 100px;
  }
  .login-img{
    display: none !important;
  }



  /* Responsiveness */

  @media (min-width: 280px) and (max-width: 575px) {
    .side-image{
      display: hidden !important;
      background-image: none !important;
      height: 100% !important;
    }
    .login-img{
      display: block !important;
    }
    .card{
      border: none !important;
      padding: 30px !important;
      width: 90% !important;
      border-radius: 10px !important;
    }
    .card{
      margin: 100px 0 !important;
    }
    .login-right {
      position: absolute !important;
      top: 0 !important;
      width: 70%;
      right: 0;
    }
    .login-left {
      position: absolute !important;
      bottom: 0 !important;
      width: 50%;
      left: 0;
    }
  }

   @media (min-width: 576px) and (max-width: 767px) {
    .image{
      display: hidden !important;
      background-image: none !important;
    }
    .login-img{
      display: block !important;
    }
  }
</style>
<body>
    {{-- Error component --}}
    <x-error-display></x-error-display>

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
                <div class="card shadow">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/buyjetLogo.png') }}" alt="" width="30%">
                    </div>
                    <h4 class="text-center py-2">Sign Up</h4>
                    <p class="text-center signin-text">Create an accont</p>

                    <form action="{{ route('register') }}" method="post" class="signup-form">
                        @csrf
                        <label for="First Name" class="label-text">First Name</label>
                        <div class="input">
                            <input type="text" class="form-control" name="firstname" placeholder="Enter Your First Name">
                            <i class="fa fa-envelope text-secondary"></i>
                        </div>

                        <label for="Last Name" class="label-text">Last Name</label>
                        <div class="input">
                            <input type="text" name="lastname" class="form-control" placeholder="Enter Your Last Name">
                            <i class="fa fa-envelope text-secondary"></i>
                        </div>

                        <label for="Email Address" class="label-text">Email Address</label>
                        <div class="input">
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email Address">
                            <i class="fa fa-envelope text-secondary"></i>
                        </div>

                        <label for="Phone Number" class="label-text">Phone Number</label>
                        <div class="input">
                            <input type="tel" name="phone_number" class="form-control" placeholder="Enter Your Phone Number">
                            <i class="fa fa-phone text-secondary"></i>
                        </div>

                        <label for="Password" class="label-text">Password</label>
                        <div class="input">
                            <input type="password" name="password" class="form-control password" placeholder="Enter Your Password">
                            <i class="fa fa-lock text-secondary"></i>
                            <i class="fa fa-eye text-secondary" onclick="showPassword()"></i>
                        </div>

                        <label for="Confirm Password" class="label-text">Confirm Password</label>
                        <div class="input">
                            <input type="password" name="password_confirmation" class="form-control confPassword"
                                placeholder="Enter Your Password Again">
                            <i class="fa fa-lock text-secondary"></i>
                            <i class="fa fa-eye text-secondary" onclick="showPassword2()"></i>
                        </div>


                        <div class="signup-button text-center">
                            <input type="submit" class="  form-control btn btn-primary"
                                    value="Sign Up">
                        </div>
                    </form>
                    <p class="text-center  text-secondary below-text">Have an Account? <a href="{{ route('login') }}"><span
                                class="create-account">Login</span></a>
                    </p>
                </div>
                <!-- <div class="col-md-6 side-image"></div> -->
            </div>
        </div>
    </section>

</body>

</html>
