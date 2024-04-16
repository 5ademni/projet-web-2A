document
  .querySelector("#formblog")
  .addEventListener("submit", function (event) {
    const id_auteurRegex = /^[1-3]+$/;
    const titreRegex = /^[a-zA-Z ]+$/;
    const contenuRegex = /^[a-zA-Z ]+$/;
    const datePublicationRegex = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;

    var id_auteurInput = document.querySelector("#id_auteur");
    var titreInput = document.querySelector("#titre");
    var contenuInput = document.querySelector("#contenu");
    var datePublicationInput = document.querySelector("#datePublication");

    // Remove any existing error messages
    document.querySelectorAll(".error-message").forEach(function (item) {
      item.remove();
    });

    if (!id_auteurRegex.test(id_auteurInput.value)) {
      event.preventDefault();
      displayError(
        "Veuillez entrer un id d'auteur valide (soit 1 ou 2 ou 3)",
        id_auteurInput
      );
    }

    if (!titreRegex.test(titreInput.value)) {
      event.preventDefault();
      displayError(
        "Veuillez entrer un titre valide (lettres et espaces uniquement)",
        titreInput
      );
    }

    if (!contenuRegex.test(contenuInput.value)) {
      event.preventDefault();
      displayError(
        "Veuillez entrer un contenu valide (lettres et espaces uniquement)",
        contenuInput
      );
    }

    if (!datePublicationRegex.test(datePublicationInput.value)) {
      event.preventDefault();
      displayError(
        "Veuillez entrer une date de publication valide (format YYYY-MM-DD)",
        datePublicationInput
      );
    }
  });

function displayError(message, inputElement) {
  var errorMessage = document.createElement("div");
  errorMessage.className = "error-message";
  errorMessage.style.color = "red";
  errorMessage.textContent = message;
  inputElement.parentNode.insertBefore(errorMessage, inputElement.nextSibling);
}
