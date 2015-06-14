// Called when token created successfully.
var successCallback = function(data) {
//    console.log(data.response.token);
//    console.log(data.response.token.token);
    if (data.response.token !== "undefined" || data.response.token !== undefined) {
        var token = data.response.token.token;
//        $("#CreditCardForm_token").val(token);
//    var myForm = document.getElementById('credit-card-form');
        var ccForm = document.getElementById('credit-card-form');
        var elem = document.getElementById("CreditCardForm_token");
            elem.value = token;
        // Set the token as the value for the token input
//    myForm.CreditCardForm['token'].value = data.response.token.token;

        // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
        ccForm.submit();
    }

};

// Called when token creation fails.
var errorCallback = function(data) {
    if (data.errorCode === 200) {
        tokenRequest();
    } else {
        alert(data.errorMsg);
    }
};

var tokenRequest = function() {
    // Setup token request arguments
    var args = {
        sellerId: "901271052",
        publishableKey: "B6A9B5FC-F174-469C-9E46-7D0F57C8050D",
        ccNo: $("#CreditCardForm_ccNumber").val(),
        cvv: $("#CreditCardForm_cvv").val(),
        expMonth: $("#CreditCardForm_expMonth").val(),
        expYear: $("#CreditCardForm_expYear").val()
    };

    // Make the token request
    TCO.requestToken(successCallback, errorCallback, args);
};

$(function() {
    // Pull in the public encryption key for our environment
    TCO.loadPubKey('sandbox');

    $("#credit-card-form").submit(function(e) {
        // Call our token request function
        tokenRequest();

        // Prevent form from submitting
        return false;
    });
});
