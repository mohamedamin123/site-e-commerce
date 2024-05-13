function moveToNextInput(input, index) {
    if (input.value.length === input.maxLength) {
        if (index < 6) {
            document.getElementById('input' + (index + 1)).focus();
        }
    } else if (input.value.length === 0 && index > 1) {
        document.getElementById('input' + (index - 1)).focus();
    }
}

document.addEventListener('keydown', function(event) {
    // Si la touche pressée est "Suppr" (Delete) et qu'un des champs d'entrée est focus
    if (event.key === 'Delete' && document.activeElement.classList.contains('pin-input')) {
        // Récupérer l'index de l'entrée actuelle
        var currentIndex = parseInt(document.activeElement.id.replace('input', ''));
        
        // Si l'index actuel est supérieur à 1
        if (currentIndex > 1) {
            // Récupérer l'entrée précédente
            var prevInput = document.getElementById('input' + (currentIndex - 1));
            
            // Supprimer le contenu de l'entrée actuelle
            document.activeElement.value = '';
            
            // Déplacer le focus vers l'entrée précédente
            prevInput.focus();
        }
    } else if (event.key === 'Backspace' && document.activeElement.classList.contains('pin-input')) {
        // Si la touche pressée est "Backspace" et qu'un des champs d'entrée est focus
        // Récupérer l'index de l'entrée actuelle
        var currentIndex = parseInt(document.activeElement.id.replace('input', ''));
        
        // Si l'index actuel est supérieur à 1 et que l'entrée actuelle est vide
        if (currentIndex > 1 && document.activeElement.value === '') {
            // Récupérer l'entrée précédente
            var prevInput = document.getElementById('input' + (currentIndex - 1));
            
            // Déplacer le focus vers l'entrée précédente
            prevInput.focus();
        }
    }
});
function signup() {
    location.href="../register/register.php";
}

function signip() {
    location.href="../login/login.php";
}