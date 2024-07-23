const passwordInput = document.getElementById("thq-sign-in-8-password");
const passwordLabel = passwordInput.previousElementSibling; // Sélectionne le label
const phoneNumberInput = document.getElementById('phoneNumberr');
const passwordField = document.getElementById('passwordFieldd');
const nextButton = document.getElementById('nextButtton');
const phoneIcon = document.getElementById('phoneIccon');

const validPrefixes = ['40', '41', '43', '44', '46','42','50', '51', '52', '53', '54', '55','56', '57','58', '59', '60', '61', '62','63', '64', '65', '66', '67','68','69', '90', '91', '94', '95', '96', '97', '98', '99']; // Liste des préfixes valides

passwordInput.addEventListener("focus", () => {
  // Réinitialise le placeholder (si nécessaire)
  if (passwordInput.placeholder === "Mot de Passe") {
    passwordInput.placeholder = ""; 
  }
});

passwordInput.addEventListener("blur", () => {
  // Rétablit le placeholder si le champ est vide
  if (!passwordInput.value) {
    passwordInput.placeholder = "";
  }
});

phoneNumberInput.addEventListener('input', function() {
  const phoneNumber = phoneNumberInput.value.replace(/\D/g, ''); // Remove non-digits
  const prefix = phoneNumber.slice(0, 2); // Récupère les deux premiers chiffres comme préfixe
  const isValid = phoneNumber.length === 8 && validPrefixes.includes(prefix); // Vérifie 8 chiffres et préfixe valide

  phoneIcon.textContent = isValid ? 'check_circle' : 'cancel'; // Mettre à jour l'icône
  phoneIcon.classList.toggle('check_circle', isValid);
  phoneIcon.classList.toggle('cancel', !isValid);
  
  nextButton.disabled = !isValid;
});

nextButton.addEventListener('click', function() {
    if (nextButton.innerText.trim() === 'Suivant') { // trim() pour supprimer les espaces
      passwordField.style.display = 'block';
      nextButton.innerText = 'Se connecter';
    } else {
      // Logique de soumission du formulaire
      const phoneNumber = phoneNumberInput.value.replace(/\D/g, '');
      const password = document.getElementById('thq-sign-in-8-password').value;
  
      // Envoyer les données au serveur pour vérification (par exemple, avec fetch ou XMLHttpRequest)
      // ...
  
      // Exemple de redirection après connexion réussie
      // window.location.href = 'page_apres_connexion.html';
    }
});


