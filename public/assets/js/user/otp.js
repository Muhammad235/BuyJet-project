const OTPinputs = document.querySelectorAll("input");
const button = document.querySelector("button");

window.addEventListener("load", () => OTPinputs[0].focus());

OTPinputs.forEach((input, index) => {
  input.addEventListener("input", () => {
    const currentInput = input;
    const nextInput = input.nextElementSibling;

    if (currentInput.value.length > 1 && currentInput.value.length == 2) {
      currentInput.value = "";
    }

    if (nextInput !== null && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
      nextInput.removeAttribute("disabled");
      nextInput.focus();
    }

    if (Array.from(OTPinputs).every(input => input.value !== "")) {
      button.removeAttribute("disabled");
    } else {
      button.setAttribute("disabled", true);
    }
  });

  input.addEventListener("keyup", (e) => {
    if (e.key === "Backspace") {
      if (input.previousElementSibling !== null) {
        e.target.value = "";
        e.target.setAttribute("disabled", true);
        input.previousElementSibling.focus();
      }
    }
  });
});
