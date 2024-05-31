
function payonline(paymentID, event) {
    // Prevent the default behavior of the anchor tag
    event.preventDefault();

    

    // Show the specific car with animation
    var productToShow = document.getElementById(paymentID);
    productToShow.classList.remove('hidden');
    productToShow.classList.add('card-header');
    
}
