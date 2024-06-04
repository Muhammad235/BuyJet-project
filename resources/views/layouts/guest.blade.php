<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuyJet Login</title>
    <link rel="icon" href="image/Logo.png">
    <link rel="stylesheet" href="styles/style.css">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="fontawesome/css/brands.css" rel="stylesheet" />
    <link href="fontawesome/css/regular.css" rel="stylesheet" />
    <link href="fontawesome/css/solid.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <section class="login-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card-login">
                        <div>
                            <div class="text-center mb-5 login-img">
                                <img src="image/buyjetLogo.png" alt="">
                            </div>
                            <h4 class="text-center">Welcome Back!</h4>
                            <p class="text-center">Sign in into your account</p>

                            <form action="">
                                <label for="Email Address" class="label-text">Email Address</label>
                                <div class="input">
                                    <input type="email" class="form-control" placeholder="Enter Your Email Address">
                                    <i class="fa fa-envelope text-secondary"></i>
                                </div>
                                <label for="Password" class="mt-3 label-text">Password</label>
                                <div class="input">
                                    <input type="password" class="form-control password"
                                        placeholder="Enter Your Password">
                                    <i class="fa fa-lock text-secondary"></i>

                                    <i class="fa fa-eye text-secondary" onclick="showPassword()"></i>
                                </div>

                                <a href="#">
                                    <p class="FP-link">Forgot Password?</p>
                                </a>
                                <div class="login-button">
                                    <a href="dashboard.html"><input type="submi" class="form-control btn btn-primary"
                                            value="Login"></a>
                                </div>
                            </form>
                            <p class="text-center  text-secondary below-text">New to Buyjet? <a href="signup.html"><span class="create-account">Create An Account</span></a>
                            </p>
                        </div> 
                    </div>
                </div>
                <div class="col-md-6 side-image"></div>
            </div>
        </div>
    </section> 


    <script src="js/main.js"></script>
</body>

</html>