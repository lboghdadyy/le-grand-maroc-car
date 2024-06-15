function calculateDays(prix) {
    // Get the start and end dates
    var startDate = document.getElementById('date1').value;
    var endDate = document.getElementById('date2').value;

    // Ensure both dates are filled
    if (startDate && endDate) {
        // Parse the dates
        var start = new Date(startDate);
        var end = new Date(endDate);

        // Calculate the time difference in milliseconds
        var timeDiff = end - start;

        // Convert time difference from milliseconds to days
        var diffDays = timeDiff / (1000 * 3600 * 24);
        total = diffDays * prix;

        // Check if the difference is valid (positive number of days)
        if (diffDays >= 0) {
            messae = "Total jour est :"+diffDays+" et total montant est :"+total;
            document.getElementById('pzip').value = messae ;
        } else {
            alert('End date must be after the start date.');
        }
    } else {
        alert('Please select both start and end dates.');
    }
}
