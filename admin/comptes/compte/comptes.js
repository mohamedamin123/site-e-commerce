function modifierUser(user) {
    if (user.statut === 0) {
        // Code to handle if user status is 0
        // For example, change the status text and perform relevant actions
        document.getElementById('userStatusText').innerText = "Désactiver";
    } else if (user.statut === 1) {
        // Code to handle if user status is 1
        // For example, change the status text and perform relevant actions
        document.getElementById('userStatusText').innerText = "Activer";
    }
}
function retour (){
    location.href="../../home/adminHome.php";
}