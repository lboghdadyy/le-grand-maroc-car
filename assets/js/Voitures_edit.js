function hide_voitures(voitureId, event) {
    // Prevent the default behavior of the anchor tag
    event.preventDefault();

    // Hide all voitures with animation
    var voitures = document.getElementsByClassName('single-featured-cars');
    for (var i = 0; i < voitures.length; i++) {
        voitures[i].classList.add('hidden');
    }

    // Show the specific car with animation
    var productToShow = document.getElementById(voitureId);
    productToShow.classList.remove('hidden');
    productToShow.classList.add('fade-in');
    productToShow.classList.add('single-new-cars-item'); // Add your animation class here
}