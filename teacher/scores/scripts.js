$(document).ready(function() {
    function populateDropdowns() {
        $.ajax({
          url: "get_students_and_activities.php",
          method: "GET",
          success: function (data) {
            // Update the studentSelect and activitySelect dropdowns
            $("#studentSelect").html(data.students);
            $("#activitySelect").html(data.activities);
          },
          error: function (error) {
            console.log("Error fetching data:", error);
          },
        });
      }
    
      // AJAX function to submit form data and handle success/failure
      $("#scoreForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
          url: "update_scores.php",
          method: "POST",
          data: $(this).serialize(),
          success: function (response) {
            // Show modal with success message
            $("#modalTitle").text("Success");
            $("#modalBody").text(response.message);
            $("#statusModal").modal("show");
          },
          error: function (error) {
            // Show modal with error message
            $("#modalTitle").text("Error");
            $("#modalBody").text("An error occurred. Please try again.");
            $("#statusModal").modal("show");
          },
        });
      });
    
      // Call the function to populate dropdowns when the page loads
      $(document).ready(function () {
        populateDropdowns();
      });
});
