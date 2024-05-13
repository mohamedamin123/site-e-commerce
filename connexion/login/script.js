let showPasswordIcon = document.getElementById("showPassword");
let hidePasswordIcon = document.getElementById("hidePassword");
let passwordInput = document.getElementById("typePasswordX");




showPasswordIcon.addEventListener("click", function () {
    showPasswordIcon.style.display = "none";
    hidePasswordIcon.style.display = "block";
    passwordInput.type = "password";
});

hidePasswordIcon.addEventListener("click", function () {
    hidePasswordIcon.style.display = "none";
    showPasswordIcon.style.display = "block";
    passwordInput.type = "text";
});



function signup() {
    location.href="../register/register.php";
}

function valideCompte() {

    let userPass = document.getElementById('typePasswordX').value;
    let errorPass = document.getElementById('passwordError');

    let userEmail = document.getElementById('typeEmailX').value;
    let errorEmail = document.getElementById('emailError');

    errorEmail.textContent = "";
    errorPass.textContent = "";

    if (userEmail.trim() == '') {
        errorEmail.textContent = "saisir votre email";
    }
    else if (!/@/.test(userEmail)) {
        errorEmail.textContent = "Votre email incorrect";
    }
    else if (userPass.trim() == '') {
        errorPass.textContent = "Saisir votre mot de passe";
    }
    else if (userPass.length < 8) {
        errorPass.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
    } else if (!/[A-Z]/.test(userPass)) {
        errorPass.textContent = "Le mot de passe doit contenir au moins une lettre majuscule.";
    } else if (!/\d/.test(userPass)) {
        errorPass.textContent = "Le mot de passe doit contenir au moins un chiffre.";
    } else {
        document.getElementById('myForm').submit();
    }

}

