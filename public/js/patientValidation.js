document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("patientForm")
  
    form.addEventListener("submit", (event) => {
      let isValid = true
      const nom = document.getElementById("nom")
      const prenom = document.getElementById("prenom")
      const email = document.getElementById("email")
      const telephone = document.getElementById("telephone")
  
      // Validation du nom
      if (!nom.value.match(/^[A-Za-z\s]+$/)) {
        isValid = false
        showError(nom, "Le nom doit contenir uniquement des lettres et des espaces")
      } else {
        removeError(nom)
      }
  
      // Validation du prénom
      if (!prenom.value.match(/^[A-Za-z\s]+$/)) {
        isValid = false
        showError(prenom, "Le prénom doit contenir uniquement des lettres et des espaces")
      } else {
        removeError(prenom)
      }
  
      // Validation de l'email
      if (!email.value.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
        isValid = false
        showError(email, "Veuillez entrer une adresse email valide")
      } else {
        removeError(email)
      }
  
      // Validation du téléphone
      if (!telephone.value.match(/^[0-9]{10}$/)) {
        isValid = false
        showError(telephone, "Le numéro de téléphone doit contenir 10 chiffres")
      } else {
        removeError(telephone)
      }
  
      if (!isValid) {
        event.preventDefault()
      }
    })
  
    function showError(input, message) {
      const container = input.parentElement
      let error = container.querySelector(".error-message")
      if (!error) {
        error = document.createElement("div")
        error.className = "error-message"
        container.appendChild(error)
      }
      error.textContent = message
      input.classList.add("invalid")
    }
  
    function removeError(input) {
      const container = input.parentElement
      const error = container.querySelector(".error-message")
      if (error) {
        container.removeChild(error)
      }
      input.classList.remove("invalid")
    }
  })
  
  