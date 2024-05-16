document.querySelector("#formEvenement").addEventListener("submit", function (event) {
    const idEvenementPattern = /^[0-9]+$/;
    const idAuteurPattern = /^[0-9]+$/;
    const titrePattern = /^[a-zA-Z0-9\s]{1,30}$/;
    const contenuPattern = /^[a-zA-Z0-9\s,;:!?@#$%&*()-+=\[\]{}|<>.\'\"]{1,1000}$/;
    const dateEvenementPattern = /^\d{4}-\d{2}-\d{2}$/;
    const lieuPattern = /^[a-zA-Z0-9\s]{1,30}$/;
    const prixPattern = /^[0-9,]+(\$|TND)$/;
    const nbPlacesPattern = /^[0-9]+$/;
    const heureEvenementPattern = /^([01]\d|2[0-3]):?([0-5]\d)$/;
    const idCategoriePattern = /^[0-9]+$/;
  
    var idEvenementInput = document.querySelector("#id_evenement");
    var idAuteurInput = document.querySelector("#id_auteur");
    var titreInput = document.querySelector("#titre");
    var contenuInput = document.querySelector("#contenu");
    var dateEvenementInput = document.querySelector("#dateEvenement");
    var lieuInput = document.querySelector("#lieu");
    var prixInput = document.querySelector("#prix");
    var nbPlacesInput = document.querySelector("#nbPlaces");
    var heureEvenementInput = document.querySelector("#heureEvenement");
    var idCategorieInput = document.querySelector("#id_categorie");
  
    // Remove any existing error messages
    document.querySelectorAll(".error-message").forEach(function (item) {
      item.remove();
    });
  
    // Check each input with the corresponding pattern and display a specific error message
    checkInput(idEvenementInput, idEvenementPattern, "ID de l'événement", "L'ID de l'événement doit être un nombre.");
    checkInput(idAuteurInput, idAuteurPattern, "ID de l'auteur", "L'ID de l'auteur doit être un nombre.");
    checkInput(titreInput, titrePattern, "Titre", "Le titre doit contenir entre 1 et 30 caractères alphanumériques.");
    checkInput(contenuInput, contenuPattern, "Contenu", "Le contenu doit contenir entre 1 et 1000 caractères alphanumériques.");
    checkInput(dateEvenementInput, dateEvenementPattern, "Date de l'événement", "La date de l'événement doit être au format AAAA-MM-JJ.");
    checkInput(lieuInput, lieuPattern, "Lieu", "Le lieu doit contenir entre 1 et 30 caractères alphanumériques.");
    checkInput(prixInput, prixPattern, "Prix", "Le prix doit être un nombre suivi de $ ou TND.");
    checkInput(nbPlacesInput, nbPlacesPattern, "Nombre de places", "Le nombre de places doit être un nombre.");
    checkInput(heureEvenementInput, heureEvenementPattern, "Heure de l'événement", "L'heure de l'événement doit être au format HH:MM.");
    checkInput(idCategorieInput, idCategoriePattern, "ID de la catégorie", "L'ID de la catégorie doit être un nombre.");
  
    // If everything is valid, submit the form
    form.submit();
  }, false);
  
  function checkInput(inputElement, pattern, inputName, errorMessage) {
    if (!pattern.test(inputElement.value)) {
      event.preventDefault();
      displayError(errorMessage, inputElement);
      inputElement.value = '';
    }
  }
  
  function displayError(message, inputElement) {
    var errorMessage = document.createElement("div");
    errorMessage.className = "error-message";
    errorMessage.style.color = "red";
    errorMessage.textContent = message;
    inputElement.parentNode.insertBefore(errorMessage, inputElement.nextSibling);
  }
  