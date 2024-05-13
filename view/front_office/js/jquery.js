function validate() {
  var valid = true;
  $(".demoInputBox").css("background-color", "");
  var message = "";

  var cardHolderNameRegex = /^[a-z ,.'-]+$/i;
  var cvvRegex = /^[0-9]{3,3}$/;

  var cardHolderName = $("#card-holder-name").val();
  var cardNumber = $("#card-number").val();
  var cvv = $("#cvv").val();

  if (cardHolderName == "" || cardNumber == "" || cvv == "") {
    message += "<div>Tous les champs sont obligatoires.</div>";
    if (cardHolderName == "") {
      $("#card-holder-name").css("background-color", "#FFFFDF");
    }
    if (cardNumber == "") {
      $("#card-number").css("background-color", "#FFFFDF");
    }
    if (cvv == "") {
      $("#cvv").css("background-color", "#FFFFDF");
    }
    valid = false;
  }

  if (cardHolderName != "" && !cardHolderNameRegex.test(cardHolderName)) {
    message += "<div>Nom sur la carte est invalide</div>";
    $("#card-holder-name").css("background-color", "#FFFFDF");
    valid = false;
  }

  if (cardNumber != "") {
    $("#card-number").validateCreditCard(function (result) {
      if (!result.valid) {
        message += "<div>le numéro du carte est invalide</div>";
        $("#card-number").css("background-color", "#FFFFDF");
        valid = false;
      }
    });
  } else if (cvv != "" && !cvvRegex.test(cvv)) {
    message += "<div>CVV est invalide</div>";
    $("#cvv").css("background-color", "#FFFFDF");
    valid = false;
  }

  if (message != "") {
    $("#error-message").show();
    $("#error-message").html(message);
  }
  return valid;
}
function check() {
  if (document.getElementById("checkA").checked) {
  }
  if (document.getElementById("checkB").checked) {
    document.getElementById("carte").hidden = false;
    document.getElementById("liv").hidden = true;
    document.getElementById("paypal").hidden = true;
    // document.getElementById("card-holder-name").required = false;
    // document.getElementById("card-number").required = false;
    // document.getElementById("userEmail-info").required = false;
    // document.getElementById("expiryMonth").required = false;
    // document.getElementById("cvv-info").required = false;
  }
  if (document.getElementById("checkC").checked) {
    document.getElementById("carte").hidden = true;
    document.getElementById("liv").hidden = true;
    document.getElementById("paypal").hidden = false;
    // document.getElementById("card-holder-name").required = false;
    // document.getElementById("card-number").required = false;
    // document.getElementById("userEmail-info").required = false;
    // document.getElementById("expiryMonth").required = false;
    // document.getElementById("cvv-info").required = false;
  }
}
