<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuyJet Login</title>
    <link rel="icon" href="image/Logo.png">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/otp.css">
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="fontawesome/css/brands.css" rel="stylesheet" />
    <link href="fontawesome/css/regular.css" rel="stylesheet" />
    <link href="fontawesome/css/solid.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

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
    /* padding-top: 100px; */
    align-items: center;
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
<body>

    <section class="login-section">
        <div class="d-none d-md-block triangle">
            <img src="image/left.png" alt="" class="left">
            <img src="image/right.png" alt="" class="right">
        </div>

        <div class="container-fluid">
            <div class="row otp-row">
                <div class="wrapper">
                    <div class="containers shadow">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/logo_dark.svg') }}" alt="" width="30%">
                        </div>

                        <h4 class="text pt-4">Email Veri
                            fication</h4>
                        <p class="text-center">Enter the 4-digit code we've sent to your email address</p>

                        <form class="form" action="{{ route('verify.reset.mail.otp') }}" method="POST">
                            @csrf
                            <div class="input_field_box">
                                <input type="number" name="otp1" />
                                <input type="number" name="otp2" disabled />
                                <input type="number" name="otp3" disabled />
                                <input type="number" name="otp4" disabled />
                            </div>

                            <button type="submit" class="btn btn-primary text-light">verify</button>
                        </form>

                    </div>
                </div>
                <!-- <div class="col-md-6 side-image"></div>  -->
            </div>
        </div>
    </section>


<script>
    const OTPinputs = document.querySelectorAll("input");
    const button = document.querySelector("button");

    window.addEventListener("load", () => OTPinputs[0].focus());

    OTPinputs.forEach((input) => {
    input.addEventListener("input", () => {
        const currentInput = input;
        const nextInput = input.nextElementSibling;

        if (currentInput.value.length > 1 && currentInput.value.length == 2 ) {
        currentInput.value = "";
        }

        if (nextInput !== null && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
        nextInput.removeAttribute("disabled");
        nextInput.focus();
        }

        if (!OTPinputs[3].disabled && OTPinputs[3].value !== "") {
        button.classList.add("active");
        }else{
        button.classList.remove("active");
        }

    });

  input.addEventListener("keyup", (e) => {
      if (e.key === "Backspace") {
        if(input.previousElementSibling !== null){
          e.target.value = "";
          e.target.setAttribute("disabled", true);
          input.previousElementSibling.focus();
        }
      }
  })

});


</script>
</body>

</html>
