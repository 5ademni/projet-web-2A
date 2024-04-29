$(document).ready(function () {
  // Load total no.of items added in the cart and display in the navbar
  load_cart_item_number();

  function load_cart_item_number() {
    $.ajax({
      url: "action.php",
      method: "get",
      data: {
        cartItem: "cart_item",
      },
      success: function (response) {
        $("#cart-item").html(response);
      },
    });
  }
});
$(document).ready(function () {
  // Load total no.of items added in the cart and display in the navbar
  order_completed_rows();

  function order_completed_rows() {
    $.ajax({
      url: "action.php",
      method: "get",
      data: {
        OrderRows: "order_completed",
      },
      success: function (response) {
        $("#order_completed").html(response);
      },
    });
  }
});
