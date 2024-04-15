
function login() {
    location.href = "../login/login.php";
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