
function fermer(voitureId,Reservationid, event) {
    // Prevent the default behavior of the anchor tag
    event.preventDefault();

    // Hide the reservation form
    var reserbationform = document.getElementById(Reservationid);
    reserbationform.classList.add('hidden');
    
    
    
    // Show the previous car
    var voiture = document.getElementById(voitureId);
    voiture.classList.remove('hidden');
    voiture.classList.add('single-new-cars-item');
}
