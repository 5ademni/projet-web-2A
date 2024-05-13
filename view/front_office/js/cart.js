$(document).ready(function (data) {
  $(".add_to_cart").click(function () {
    var product_id = $(this).attr("id");
    var product_name = $("#name" + product_id).val();
    var product_price = $("#price" + product_id).val();
    var product_quantity = $("#quantity" + product_id).val();
    var action = "add";
    if (product_quantity < 0) {
      $.ajax({
        url: "action.php",
        method: "POST",
        dataType: "json",
        data: {
          product_id: product_id,
          product_name: product_name,
          product_price: product_price,
          product_quantity: product_quantity,
          action: action,
        },
        success: function (data) {
          $(".badge").text(data.cart_item);
          alert("Ajouter au panier");
        },
      });
    } else {
      alert("S'il vous plaît entrez une quanté ");
    }
  });
  $(document).on("click", ".delete", function () {
    var product_id = $(this).attr("id");
    var action = "remove";
    if (confirm("Voulez vous supprimer ce produit?")) {
      $.ajax({
        url: "action.php",
        method: "POST",
        dataType: "json",
        data: { product_id: product_id, action: action },
        success: function (data) {
          $("#order_table").html(data.order_table);
          $(".badge").text(data.cart_item);
        },
      });
    } else {
      return false;
    }
  });
  $(document).on("keyup", ".quantity", function () {
    var product_id = $(this).data("product_id");
    var quantity = $(this).val();
    var action = "quantity_change";
    if (quantity != "") {
      $.ajax({
        url: "action.php",
        method: "POST",
        dataType: "json",
        data: { product_id: product_id, quantity: quantity, action: action },
        success: function (data) {
          $("#order_table").html(data.order_table);
        },
      });
    }
  });
});
