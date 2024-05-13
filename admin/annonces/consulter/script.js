
function showDetails() {
    var titre = document.getElementById('titre' );
    var prix = document.getElementById('prix' );
    var image = document.getElementById('image' );
    var description = document.getElementById('description' );

    console.log(titre);
    // Vérifie si le titre est actuellement visible ou non
    var isVisible = window.getComputedStyle(titre).getPropertyValue('opacity') === '1';

    // Ajoute une transition à toutes les propriétés CSS concernées
    titre.style.transition = 'opacity 0.5s ease';
    prix.style.transition = 'opacity 0.5s ease';
    image.style.transition = 'opacity 0.5s ease';


    description.style.transition = 'opacity 0.5s ease';


    // Inverse la visibilité de chaque élément
    titre.style.opacity = isVisible ? '0' : '1';
    prix.style.opacity = isVisible ? '0' : '1';
    image.style.opacity = isVisible ? '0' : '1';
    description.style.opacity = isVisible ? '1' : '0';


    // Ajoutez d'autres détails ici si nécessaire
}
