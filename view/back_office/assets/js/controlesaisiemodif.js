document.querySelector("#eventf").addEventListener("submit", function (event) {
    const titrePattern = /^[a-zA-Z0-9\s]{1,30}$/;
    const contenuPattern = /^[a-zA-Z0-9\s,;:!?@#$%&*()-+=\[\]{}|<>.\'\"]{1,1000}$/;
    const lieuPattern = /^[a-zA-Z0-9\s]{1,30}$/;
    const prixPattern = /^[0-9]+(\.[0-9]+)?$/;
    const nbPlacesPattern = /^[0-9]+$/;
    const idCategoriePattern = /^[0-9]+$/;
  
    var titreInput = document.querySelector("#titre");
    var contenuInput = document.querySelector("#contenu");
    var lieuInput = document.querySelector("#lieu");
    var prixInput = document.querySelector("#prix");
    var nbPlacesInput = document.querySelector("#nbPlaces");
    var idCategorieInput = document.querySelector("#id_categorie");
    
  
    // Remove any existing error messages
    document.querySelectorAll(".error-message").forEach(function (item) {
      item.remove();
    });
  
    // Check each input with the corresponding pattern and display a specific error message
    checkInput(titreInput, titrePattern, "Titre", "Le titre doit contenir entre 1 et 30 caractères alphanumériques.");
    checkInput(contenuInput, contenuPattern, "Contenu", "Le contenu doit contenir entre 1 et 1000 caractères alphanumériques.");
    checkInput(lieuInput, lieuPattern, "Lieu", "Le lieu doit contenir entre 1 et 30 caractères alphanumériques.");
    checkInput(prixInput, prixPattern, "Prix", "Le prix doit être un nombre et le point remplace la virgule.");
    checkInput(nbPlacesInput, nbPlacesPattern, "Nombre de places", "Le nombre de places doit être un nombre.");
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
  