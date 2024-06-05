 // Get references to the date inputs and number of days input
 var startDateInput = document.getElementById("start_date");
 var endDateInput = document.getElementById("end_date");
 var numDaysInput = document.getElementById("pzip_code");

 // Add event listeners to the date inputs
 startDateInput.addEventListener("change", calculateDays);
 endDateInput.addEventListener("change", calculateDays);

 // Function to calculate the number of days between the start and end dates
 function calculateDays() {
     const startDate = new Date(startDateInput.value);
     const endDate = new Date(endDateInput.value);

     if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
         const timeDifference = endDate.getTime() - startDate.getTime();
         const daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));
         numDaysInput.value = daysDifference;
     } else {
         numDaysInput.value = "";
     }
 }