    let showPasswordIcon = document.getElementById("showPassword");
    let hidePasswordIcon = document.getElementById("hidePassword");
    let passwordInput = document.getElementById("typePasswordX"); 

    let showPasswordIconConfirme = document.getElementById("showPasswordComfirme");
    let hidePasswordIconComfirme = document.getElementById("hidePasswordComfirme");
    let passwordInputComfirme = document.getElementById("typePasswordComfirmeX"); 

    let button = document.getElementById("myLogin"); 
    let errorPass = document.getElementById('passwordError');
    let errorPassComfirme = document.getElementById('passwordErrorComfirme');



    showPasswordIcon.addEventListener("click", function() {
        showPasswordIcon.style.display = "none";
        hidePasswordIcon.style.display = "block";
        passwordInput.type = "password";
    });

    hidePasswordIcon.addEventListener("click", function() {
        hidePasswordIcon.style.display = "none";
        showPasswordIcon.style.display = "block";
        passwordInput.type = "text";
    });



    showPasswordIconConfirme.addEventListener("click", function() {
        showPasswordIconConfirme.style.display = "none";
        hidePasswordIconComfirme.style.display = "block";
        passwordInputComfirme.type = "password";
    });

    hidePasswordIconComfirme.addEventListener("click", function() {
        hidePasswordIconComfirme.style.display = "none";
        showPasswordIconConfirme.style.display = "block";
        passwordInputComfirme.type = "text";
    });

    button.addEventListener("click",function(){

        userPass=passwordInput.value;
        userPassComfirme=passwordInputComfirme.value;
        errorPass.textContent="";
        errorPassComfirme.textContent="";

        if(userPass.trim()=='') {
            errorPass.textContent = "Saisir votre mot de passe";
        }
        else if(userPass.length < 8) {
            errorPass.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
        } else if (!/[A-Z]/.test(userPass)) {
            errorPass.textContent = "Le mot de passe doit contenir au moins une lettre majuscule.";
        } else if (!/\d/.test(userPass)) {
            errorPass.textContent = "Le mot de passe doit contenir au moins un chiffre.";


        } else if(userPassComfirme.trim()=='') {
            errorPassComfirme.textContent = "Saisir votre mot de passe";
        }
        else if(userPassComfirme.length < 8) {
            errorPassComfirme.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
        } else if (!/[A-Z]/.test(userPassComfirme)) {
            errorPassComfirme.textContent = "Le mot de passe doit contenir au moins une lettre majuscule.";
        } else if (!/\d/.test(userPassComfirme)) {
            errorPassComfirme.textContent = "Le mot de passe doit contenir au moins un chiffre.";
        }


        else if(passwordInput.value.trim()!=passwordInputComfirme.value.trim()) {
            errorPassComfirme.textContent = "Les deux mot de passes doit etre identique";

        } else {
            document.getElementById('myForm').submit();

        }
    });