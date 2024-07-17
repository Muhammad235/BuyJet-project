const step_1 = document.querySelector(".step_1");
const step_2 = document.querySelector(".step_2");
const step = document.querySelector(".step");
const steps = document.querySelector(".steps");
const stepss = document.querySelector(".stepss");
const circle_3 = document.querySelector(".circle_3");
const circle_1 = document.querySelector(".circle_1");
const indicator_1 = document.querySelector(".indicator_1");
const indicator_3 = document.querySelector(".indicator_3");
const next_step_1 = document.querySelector(".btnext");
const next_step_2 = document.querySelector(".next_step_2");
const product_currency = document.querySelector(".options_currency");
const select_currency = document.querySelector(".select-btn_currency");
const chevron_currency = document.querySelector(".chevron_currency");
const check_currency = document.querySelector(".check_currency");
const product = document.querySelector(".options");
const select = document.querySelector(".select-btn");
const chevron = document.querySelector(".chevron");
const check = document.querySelector(".check");
const modalButton = document.querySelector(".modalfooter");
const btnContinue = document.querySelector(".btn-continue");
const btnDashboard = document.querySelector(".btn-dashboard");
const modalComplete = document.querySelector(".modal-complete");
const modalError = document.querySelector(".modal-error");



modalButton.addEventListener("click", function () {
  btnContinue.style.display = "none";
  btnDashboard.style.display = "block";

  modalError.style.display = "none";
  modalComplete.style.display = "block";

  step.style.display = "none";
  steps.style.display = "none";
  stepss.style.display = "block";
});

product_currency.addEventListener("click", function () {
  chevron_currency.style.display = "none";
  check_currency.style.display = "block";
});

select_currency.addEventListener("click", function () {
  chevron_currency.style.display = "block";
  check_currency.style.display = "none";
});

product.addEventListener("click", function () {
  chevron.style.display = "none";
  check.style.display = "block";
});

select.addEventListener("click", function () {
  chevron.style.display = "block";
  check.style.display = "none";
});

next_step_1.addEventListener("click", function () {
  step_1.style.display = "none";
  step_2.style.display = "block";


  step.style.display = "none";
  steps.style.display = "block";
  stepss.style.display = "none";

  // indicator_3.classList.add("active");
  // circle_3.classList.add("active");
});


// Dropdown for gift card
const optionMenu = document.querySelector(".select-menu"),
       selectBtn = optionMenu.querySelector(".select-btn"),
       options = optionMenu.querySelectorAll(".option"),
       sBtn_text = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));       

options.forEach(option =>{
    option.addEventListener("click", ()=>{
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;

        optionMenu.classList.remove("active");
    })
}) 

// Dropdown for currency
const optionMenu_currency = document.querySelector(".select-menu_currency"),
       selectBtn_currency = optionMenu_currency.querySelector(".select-btn_currency"),
       options_currency = optionMenu_currency.querySelectorAll(".option_currency"),
       sBtn_text_currency = optionMenu_currency.querySelector(".sBtn-text_currency");

selectBtn_currency.addEventListener("click", () => optionMenu_currency.classList.toggle("active"));       

options_currency.forEach(option_currency =>{
    option_currency.addEventListener("click", ()=>{
        let selectedOption = option_currency.querySelector(".option-text_currency").innerText;
        sBtn_text_currency.innerText = selectedOption;

        optionMenu_currency.classList.remove("active");
    })
})

// Search filter
const search = () =>{
    const searchbox = document.getElementById("search-item").value.toUpperCase();
    const storeitems = document.getElementById("product-list")
    const product = document.querySelectorAll(".option")
    const pname = storeitems.getElementsByTagName("h6")

    for (var i = 0; i < pname.length; i++) {
        let match = product[i].getElementsByTagName('h6')[0];

        if (match) {
            let textvalue = match.textContent || match.innerHTML

            if (textvalue.toUpperCase().indexOf(searchbox) > -1) {
                product[i].style.display = "";
            } else {
                product[i].style.display = "none";
            }
        }
    }
}

// Search filter for currency
const search_currency = () =>{
    const searchbox_currency = document.getElementById("search-item_currency").value.toUpperCase();
    const storeitems_currency = document.getElementById("product-list_currency")
    const product_currency = document.querySelectorAll(".option_currency")
    const pname_currency = storeitems_currency.getElementsByTagName("h5")

    for (var i = 0; i < pname_currency.length; i++) {
        let match = product_currency[i].getElementsByTagName('h5')[0];

        if (match) {
            let textvalue = match.textContent || match.innerHTML

            if (textvalue.toUpperCase().indexOf(searchbox_currency) > -1) {
                product_currency[i].style.display = "";
            } else {
                product_currency[i].style.display = "none";
            }
        }
    }
}

// counter
let counter = 0;

const counterValue = document.getElementById('counter-value');
const incrementBtn = document.getElementById('increment-btn');
const decrementBtn = document.getElementById('decrement-btn');
const resetBtn = document.querySelector('#reset');

// To increment the value of counter
incrementBtn.addEventListener('click', () => {
    counter++;
    counterValue.innerHTML = counter;
});

// To decrement the value of counter
decrementBtn.addEventListener('click', () => {
    counter--;
    counterValue.innerHTML = counter;
});