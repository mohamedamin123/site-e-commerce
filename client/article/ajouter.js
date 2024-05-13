function login (){
    location.href = "../../connexion/login/login.php";
}
document.addEventListener('DOMContentLoaded', function() {
    var profileLink = document.getElementById('login');
    if (profileLink) {
        profileLink.addEventListener('click', function() {
            // Rediriger vers profile.php
            window.location.href = '../profile/profile.php?email=<?php echo urlencode($email); ?>';
        });
    }
});

function uploadAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar').setAttribute('src', e.target.result);
            document.getElementById('avatar_form').submit(); // Envoie automatique du formulaire
        };
        reader.readAsDataURL(input.files[0]);
        document.getElementById('myForm').submit();

    }
}

