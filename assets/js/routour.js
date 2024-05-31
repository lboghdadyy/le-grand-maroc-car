function show_voitures(voitureId, event) {
    // Prevent the default behavior of the anchor tag
    event.preventDefault();

    // Hide the specific car
    var productToShow = document.getElementById(voitureId);
    productToShow.classList.add('hidden');
    productToShow.classList.remove('single-new-cars-item');
    
    
    // Show all other voitures
    var voitures = document.getElementsByClassName('single-featured-cars');
    for (var i = 0; i < voitures.length; i++) {
        if (voitures[i].id !== voitureId) { // Exclude the specific car
            voitures[i].classList.remove('hidden');
            voitures[i].classList.add('single-new-cars-item');
        }
    }
}