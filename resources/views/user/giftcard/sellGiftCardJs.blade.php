<script>

    function validateInput(input) {
        // Remove any non-numeric characters and multiple decimal points
        input.value = input.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
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
        // const estimatedAmountElement = document.getElementById('estimated-amount');
        // let cardTypeChargeAmount = document.getElementById('card-type-charge');
        // let receiptStatusChargeAmount = document.getElementById('receipt-status-charge');
        let totalAmount = document.getElementById('total-amount');


        // cardTypeChargeAmount.textContent = cardCharge;
        // receiptStatusChargeAmount.textContent = receiptStatusCharge;

        if (!isNaN(amountValue)) {

            if (!isNaN(sellRate) && !isNaN(amountValue)) {
                const amountInNaira = sellRate * amountValue;

                const total = parseFloat(amountInNaira) + parseFloat(cardCharge) + parseFloat(receiptStatusCharge);

                // estimatedAmountElement.textContent = amountInNaira.toFixed(2);
                // amountExpected.text(`₦${total.toFixed(2)}`);

                totalAmount.textContent = total.toFixed(2).toLocaleString();

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


        var selectedFile;
        var maxFileSize = 4 * 1024 * 1024; // 4MB in bytes

        $('input[name="payment_proof"]').on('change', function(event) {
            let files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                let file = files[i];

                // Check if the file is an image
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
                    selectedFile = null; // Clear any previously selected file
                    return;
                }

                // Check the file size
                if (file.size > maxFileSize) {
                    Swal.fire({
                        text: 'File ' + file.name + ' exceeds the 4MB size limit!',
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Upload again!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                    selectedFile = null; // Clear any previously selected file
                    return;
                }

                // Save the file object for later use
                selectedFile = file;
            }
        });

        $('#btn-giftcard').on('click', function() {

            // if (!fileName || fileName === undefined) {
            //     Swal.fire({
            //         text: "Kindly upload the giftcard image to proceed!",
            //         icon: "error",
            //         buttonsStyling: false,
            //         confirmButtonText: "Ok",
            //         customClass: {
            //             confirmButton: "btn btn-primary"
            //         }
            //     });
            //     return;
            // }

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

            var giftCardModal = $('.giftCardModal');
            giftCardModal.modal('hide');

            var modalComplete = $('.modal-complete');
            modalComplete.modal('show');
            modalComplete.modal({
                backdrop: 'static',
                keyboard: false
            });

            sellGiftCard();
        });


        function sellGiftCard() {
            var giftCardValue = parseFloat($("#card-value").val());

            // Create a FormData object to handle text and file data
            var formData = new FormData();
            formData.append('currency_id', selectedCurrencyId);
            formData.append('giftcard_id', selectedGiftCardId);
            formData.append('is_physical', isPhysicalCard);
            formData.append('with_receipt', selectedReceiptStatus);
            formData.append('amount', giftCardValue);
            formData.append('_token', '{{ csrf_token() }}');

            // Append the file if it's selected
            if (selectedFile) {
                formData.append('payment_proof', selectedFile); // Add the file to FormData
            }

            $.ajax({
                url: "{{ route('giftcard.store') }}",
                type: 'POST',
                data: formData,
                processData: false,  // Prevent jQuery from processing the data
                contentType: false,  // Set content type to false, letting the browser set it
                beforeSend: function () {
                    $('#sellGiftcard').attr('disabled', true);
                    $('.purchaseBtn').html('<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span>Loading...');
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
                    $('#sellGiftcard').attr('disabled', false);
                }
            });
        }
    });

    </script>
