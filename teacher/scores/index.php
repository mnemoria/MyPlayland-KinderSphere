<?php include "../base-start.php" ?>


<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Activity Scores</h1>
    </div>

    <!-- Include Bootstrap CSS and JS -->
    <!-- Add a form to update scores -->
    <form id="scoreForm">
    <div class="form-group">
        <label for="studentSelect">Select Student:</label>
        <select class="form-control" id="studentSelect" name="student_id">
        <!-- Populate student options dynamically using AJAX -->
        <option value="">Select a student</option>
        <!-- Add more options here dynamically -->
        </select>
    </div>
    <div class="form-group">
        <label for="activitySelect">Select Activity:</label>
        <select class="form-control" id="activitySelect" name="activity_id">
        <!-- Populate activity options dynamically using AJAX -->
        <option value="">Select an activity</option>
        <!-- Add more options here dynamically -->
        </select>
    </div>
    <div class="form-group">
        <label for="scoreInput">Score:</label>
        <input type="text" class="form-control" id="scoreInput" name="activity_score">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>


<!-- Add the modal at the end of the body -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalBody">
        <!-- Content of the modal dynamically set by JavaScript -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script>
  // AJAX function to fetch students and activities for dropdowns
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
</script>



<?php include "../base-end.php" ?>