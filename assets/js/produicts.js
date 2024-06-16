
    function hide_voitures(voitureId, event) {
        // Prevent the default behavior of the anchor tag
        event.preventDefault();
        var voitures = document.getElementsByClassName('single-featured-cars');
        for (var i = 0; i < voitures.length; i++) {
            voitures[i].classList.add('hidden');
        }
        var productToShow = document.getElementById(voitureId);
        productToShow.classList.remove('hidden');
        productToShow.classList.add('single-new-cars-item');
    }
    