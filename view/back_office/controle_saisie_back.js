const form = document.getElementById("form");


const id_auteurInput = document.getElementById("id_auteur");
const titreInput = document.getElementById("titre");
const contenuInput = document.getElementById("contenu");
const datePublicationInput = document.getElementById("datePublication");

form.addEventListener("submit", function (event) {
  event.preventDefault();
  validerId_auteur();
  validerTitre();
  validerContenu();
  validerDatePublication();
});



  function validerId_auteur() {
    const id_auteurValeur = id_auteurInput.value;
    const id_auteurRegex = /^[1-3]*$/;
    const erreurId_auteur = document.getElementById("erreurId_auteur");
  
    if (id_auteurValeur === "") {
      erreurId_auteur.innerHTML = "<span style='color:red'>Veuillez remplir ce champ</span>";
    } else if (!id_auteurValeur.match(id_auteurRegex)) {
      erreurId_auteur.innerHTML = "<span style='color:red'>Veuillez entrer un id d'auteur valide (soit 1 ou 2 ou 3)</span>";
    } else {
      erreurId_auteur.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  
  function validerTitre() {
    const titreValeur = titreInput.value;
    const titreRegex = /^[a-zA-Z ]*$/;
    const erreurTitre = document.getElementById("erreurTitre");
  
    if (titreValeur === "") {
      erreurTitre.innerHTML = "<span style='color:red'>Veuillez remplir ce champ</span>";
    } else if (!titreValeur.match(titreRegex)) {
      erreurTitre.innerHTML = "<span style='color:red'>Veuillez entrer un titre valide (lettres et espaces uniquement)</span>";
    } else {
      erreurTitre.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  
  function validerContenu() {
    const contenuValeur = contenuInput.value;
    const contenuRegex = /^[a-zA-Z ]*$/;
    const erreurContenu = document.getElementById("erreurContenu");
  
    if (contenuValeur === "") {
      erreurContenu.innerHTML = "<span style='color:red'>Veuillez remplir ce champ</span>";
    } else if (!contenuValeur.match(contenuRegex)) {
      erreurContenu.innerHTML = "<span style='color:red'>Veuillez entrer un contenu valide (lettres et espaces uniquement)</span>";
    } else {
      erreurContenu.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }
  
  function validerDatePublication() {
    const datePublicationValeur = datePublicationInput.value;
    const datePublicationRegex = /^[0-9]{4}-[0-9]{2}-[0-9]{2}$/;
    const erreurDatePublication = document.getElementById("erreurDatePublication");
  
    if (datePublicationValeur === "") {
      erreurDatePublication.innerHTML = "<span style='color:red'>Veuillez remplir ce champ</span>";
    } else if (!datePublicationValeur.match(datePublicationRegex)) {
      erreurDatePublication.innerHTML = "<span style='color:red'>Veuillez entrer une date de publication valide (format YYYY-MM-DD)</span>";
    } else {
      erreurDatePublication.innerHTML = "<span style='color:green'> Correct </span>";
    }
  }