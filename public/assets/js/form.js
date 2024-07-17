$(document).ready(function() {

    $("#selected-img").hide();

    $('.edit-crypto').click(function () {
        
        var cryptoID = $(this).data('cryptoid');
        var url = '/admin/manage/crypto/' + cryptoID;
        console.log(cryptoID);
        $.ajax({
            method: "GET",
            url: url,
            dataType: "json",
            success: function(data) {
                $('#editCryptoModal').modal('show');
                $("#editCryptoForm").attr("action", "/admin/manage/crypto/" + data.id);
                $("#editCryptoForm input[name='wallet_address']").val(data.wallet_address);
                $("#editCryptoForm input[name='id']").val(data.id);
                $("#editCryptoForm input[name='name']").val(data.name);
                $("#editCryptoForm input[name='charge']").val(data.charge);
                // $("#editCryptoForm input[name='buy_rate']").val(parseFloat(data.buy_rate).toFixed(2));
                // $("#editCryptoForm input[name='sell_rate']").val(parseFloat(data.sell_rate).toFixed(2));
                $("#editCryptoForm #selected-img").attr("src", data.symbol);
                $("#editCryptoForm select[name='status']").val(data.status);

                // For each asset, populate the asset fields in the form
                var assets = JSON.parse(data.assets);
                $('#update-repeater-list').empty(); // Clear existing asset fields

                assets.forEach(function(asset) {
                    var assetField = `
                        <div class="update-repeater-item">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3 me-3">
                                        <label>Asset Name</label>
                                        <input type="text" class="form-control" name="assetname[]" value="${asset.assetname}" placeholder="Enter Asset Name">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3 me-3">
                                        <label>Wallet </label>
                                        <input type="text" class="form-control" name="assetaddress[]" value="${asset.assetaddress}" placeholder="Enter Wallet Address">
                                    </div>
                                </div>
                                <div class="col-3 align-self-end">
                                    <input type="button" class="update-delete-btn btn btn-danger" value="Delete"/>
                                </div>
                            </div>
                        </div>`;

                    $('#editCryptoForm #update-repeater-list').append(assetField);
                });

                $('.update-delete-btn').click(function () {
                    $(this).closest('.update-repeater-item').remove();
                });
            
            }
        });
    });
});


function displaySelectedImage() {
    // Get the selected file input element

    var fileInput = document.getElementById('selectedimage');
   

    // Get the selected file
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

function displayBannerImage(){
    // Get the selected file input element
    var fileInput = document.getElementById('bannerimage');

    // Get the selected file 
    var selectedFile = fileInput.files[0];

    // Get the img element
    var imgElement = document.getElementById('banner-img');

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

ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
            console.log( editor );
    } )