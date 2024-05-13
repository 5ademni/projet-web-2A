/*-----------------------
    cart-plus-minus-button 
    -------------------------*/
$(".cart-plus-minus").append(
  '<div class="dec qtybutton"></div><div class="inc qtybutton"></div>'
);
$(".qtybutton").on("click", function () {
  var $button = $(this);
  var oldValue = $button.parent().find("input").val();
  if ($button.text() == "+") {
    var newVal = parseFloat(oldValue) + 1;
  } else {
    // Don't allow decrementing below zero
    if (oldValue > 1) {
      var newVal = parseFloat(oldValue) - 1;
    } else {
      newVal = 1;
    }
  }
  $button.parent().find("input").val(newVal);
});

// bouton plus et moins
