function valideCompte() {

    let userPass = document.getElementById('typePasswordX').value;
    let errorPass = document.getElementById('passwordError');

    let userEmail = document.getElementById('typeEmailX').value;
    let errorEmail = document.getElementById('emailError');

    errorEmail.textContent = "";
    errorPass.textContent = "";

    if(userEmail.trim()=='') {
        errorEmail.textContent = "saisir votre email";
    }
    else if (!/@/.test(userEmail)) {
        errorEmail.textContent = "Votre email doit contenir le caractere @";
    }
    else if(userPass.trim()=='') {
        errorPass.textContent = "Saisir votre mot de passe";
    }
    else if(userPass.length < 8) {
        errorPass.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
    } else if (!/[A-Z]/.test(userPass)) {
        errorPass.textContent = "Le mot de passe doit contenir au moins une lettre majuscule.";
    } else if (!/\d/.test(userPass)) {
        errorPass.textContent = "Le mot de passe doit contenir au moins un chiffre.";
    } else {
        document.getElementById('myForm').submit();
    }
    
}

