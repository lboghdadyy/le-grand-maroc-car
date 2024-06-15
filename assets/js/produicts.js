
    function hide_voitures(voitureId, event) {
        // Prevent the default behavior of the anchor tag
        event.preventDefault();
        var voitures = document.getElementsByClassName('single-featured-cars');
        for (var i = 0; i < voitures.length; i++) {
            voitures[i].classList.add('hidden');
        }
        var add_form = document.getElementById(voitureId);
        if(!add_form.classList.contains('hidden')){
            add_form.classList.add('hidden');
        }
    }
    