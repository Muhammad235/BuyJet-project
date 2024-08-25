<script>

function validateInput(input) {
    // Remove any non-numeric characters and multiple decimal points
    input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
}

function displaySelectedImage() {


    var fileInput = document.getElementById('selectedimage');
    var selectedFile = fileInput.files[0];

    // Get the img element
    var imgElement = document.getElementById('selected-img');
    imgElement.style.display = "block";

    // Create a FileReader to read the selected file
    var reader = new FileReader();

    // Define a function to run when the FileReader has successfully loaded the image
    reader.onload = function(e) {
        // Set the src attribute of the img element to the data URL of the selected image
        imgElement.src = e.target.result;
    };

    // Read the selected file as a data URL (this will trigger the onload function)
    reader.readAsDataURL(selectedFile);
}

function showAmountInNaira() {
    const rateElement = document.getElementById('rate');
    // const chargeElement = document.getElementById('rate');
    const sellRate = parseFloat(rateElement.getAttribute('data-sellrate'));

    // const amountInput = document.getElementById('card-value');
    const amountValue = parseFloat(document.getElementById('card-value').value);


    var cardType = $('input[name="is_physical_card"]:checked');
    var receiptStatus = $('input[name="with_receipt"]:checked');

    const cardCharge = cardType.length ? cardType.data('cardcharge') : 0;
    const receiptStatusCharge = receiptStatus.length ? receiptStatus.data('receiptstatuscharge') : 0;

    const amountExpected = $("#amountExpected");
    const estimatedAmountElement = document.getElementById('estimated-amount');
    let cardTypeChargeAmount = document.getElementById('card-type-charge');
    let receiptStatusChargeAmount = document.getElementById('receipt-status-charge');
    let totalAmount = document.getElementById('total-amount');


    cardTypeChargeAmount.textContent = cardCharge;
    receiptStatusChargeAmount.textContent = receiptStatusCharge;

    if (!isNaN(amountValue)) {

        if (!isNaN(sellRate) && !isNaN(amountValue)) {
            const amountInNaira = sellRate * amountValue;

            estimatedAmountElement.textContent = amountInNaira.toFixed(2);
            amountExpected.text(`₦${amountInNaira.toFixed(2)}`);

            const total = parseFloat(amountInNaira) + parseFloat(cardCharge) + parseFloat(receiptStatusCharge);
            console.log('Total ' + total.toFixed(2));

            // cardTypeChargeAmount.text(`₦${Total.toFixed(2)}`);

            totalAmount.textContent = total.toFixed(2);

        } else {
            estimatedAmountElement.textContent = '0';
        }

        return;
    }
    amountExpected.text("0");
}


$(document).ready(function() {

    const next_step_1 = document.querySelector(".btnext");
    const next_step_2 = document.querySelector(".next_step_2");

    var selectedCurrencyId;
    var selectedCurrencyName;
    var selectedGiftCardId;
    var selectedGiftCardName;
    var isPhysicalCard;
    var selectedReceiptStatus;

    $(".giftcard-option").on("click", function() {
        selectedGiftCardId = $(this).data('giftcardid');
        selectedGiftCardName = $(this).data('giftcardname');
    });

    $(".list_currency").on("click", function() {
        selectedCurrencyId = $(this).data('currency');
        selectedCurrencyName = $(this).data('currencyname');
    });

    $('input[name="is_physical_card"]').on("change", function() {
        isPhysicalCard = $(this).val();
    });

    $('input[name="with_receipt"]').on("change", function() {
        selectedReceiptStatus = $(this).val();
    });


    $("#continue-btn").on("click", function() {

        var cardInputValue = parseFloat($("#card-value").val());

        var data = {
            selectedCurrencyId: selectedCurrencyId,
            selectedGiftCardId: selectedGiftCardId,
            isPhysicalCard: isPhysicalCard,
            withReceipt: selectedReceiptStatus,
            selectedCurrencyName: selectedCurrencyName,
            selectedGiftCardName: selectedGiftCardName,
            amount: cardInputValue
        };


        // Check if any of the data values are empty

        if (!data.selectedCurrencyId || !data.selectedGiftCardId || data.isPhysicalCard === undefined || data.withReceipt === undefined || !data.selectedCurrencyName || !data.selectedGiftCardName || isNaN(data.amount) || data.amount <= 0) {
            Swal.fire({
                text: "You must fill all data about your giftcard, before you proceed!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });

        } else {

            next_step_1.addEventListener("click", function () {
              step_1.style.display = "none";
              step_2.style.display = "block";

              step.style.display = "none";
            });

            processCollectedData(data);
        }

    });


    function processCollectedData(data) {
        $("#giftCard").text(data.selectedGiftCardName);
        $("#currency").text(data.selectedCurrencyName);

        if(data.isPhysicalCard == 0){
            $("#cardType").text("E-code");
        } else {
            $("#cardType").text("Physical");
        }

        if(data.withReceipt == 0){
            $("#receiptStatus").text("No Receipt");
        } else {
            $("#receiptStatus").text("With Receipt");
        }

        var cardValue = parseFloat($("#card-value").val());

        if(!isNaN(cardValue)){
            $("#amountIndollar").text(`$${cardValue}`);
        }
    }

    var fileName;
    var maxFileSize = 4 * 1024 * 1024; // 4MB in bytes

    $('input[name="payment_proof"]').on('change', function(event) {
        let files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            if (!file.type.startsWith('image/')) {
                    Swal.fire({
                        text: 'File ' + file.name + ' is not an image!',
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Upload again!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                return;
            }
            if (file.size > maxFileSize) {
                Swal.fire({
                        text: 'File ' + file.name + ' exceeds the 4MB size limit.!',
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Upload again!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                return;
            }
            fileName = file.name;
        }
    });


    $('#btn-giftcard').on('click', function() {

        if (!fileName || fileName === undefined) {
            Swal.fire({
                text: "Kindly upload the giftcard image to proceed!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
            return;
        }

        var giftCardModal = $('.giftCardModal');
        giftCardModal.modal('show');
    });

    $('#checkbox').change(function() {
        if ($(this).is(':checked')) {
            $('#sellGiftcard').attr('disabled', false);
        } else {
            $('#sellGiftcard').attr('disabled', true);
        }
    });

    $('#sellGiftcard').on('click', function() {

        var modalComplete = $('.modal-complete');
        modalComplete.modal('show');

        sellGiftCard();
    });


    function sellGiftCard(){

        var giftCardValue = parseFloat($("#card-value").val());

        var data = {
            currency_id: selectedCurrencyId,
            giftcard_id: selectedGiftCardId,
            is_physical: isPhysicalCard,
            with_receipt: selectedReceiptStatus,
            payment_proof: fileName,
            amount: giftCardValue,
            '_token': '{{ csrf_token() }}'
        }

        // console.log(data);

        $.ajax({
            url: "{{ route('giftcard.store') }}",
            type: 'POST',
            data: data,
            beforeSend: function (){
                $('#sellGiftcard').attr('disabled', true)
                $('.purchaseBtn').
                html('<span class="spinner-border spinner-border-sm text-light" role="status"  aria-hidden="true"></span>Loading...')
            },
            success: function(response) {

                if (response.status) {
                    console.log('Success:', response);
                }
            },
            error: function(error) {
                console.error('Error:', error);
            },
            complete: function() {
                $('#sellGiftcard').hide();
                $('#sellGiftcard').attr('disabled', false)
            }
        });
    }

});

</script>