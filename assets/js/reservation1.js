function Reservation(voitureId,Reservationid,event){
    event.preventDefault();
 
     // Hide the specific car
     var productToShow = document.getElementById(voitureId);
     productToShow.classList.add('hidden');
     productToShow.classList.remove('single-new-cars-item');
     var Reservation = document.getElementById(Reservationid);
     Reservation.classList.remove('hidden');
 }