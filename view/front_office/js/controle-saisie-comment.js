document
  .querySelector("#formblog")
  .addEventListener("submit", function (event) {

    var commentaireInput = document.querySelector("#id_commentaire");

    // Remove any existing error messages
    document.querySelectorAll(".error-message").forEach(function (item) {
      item.remove();
    });

    if (commentaireInput.value.length < 5) {
      event.preventDefault();
      displayError(
        "Veuillez entrer un commentaire d'au moins 5 caractères",
        commentaireInput
      );
    }
});