<?php include "../base-start.php" ?>

<div class="container mt-4">
  <h1 class="h3 mb-4 text-gray-800">Feedbacks from Students</h1>
  <div id="feedbacks">
    <!-- Feedbacks will be loaded here via AJAX -->
  </div>
</div>

<script>
  $(document).ready(function() {
    // AJAX to load feedbacks from teacher_load_feedbacks.php
    $.ajax({
      url: "teacher_load_feedbacks.php",
      type: "GET",
      dataType: "html",
      success: function(response) {
        $("#feedbacks").html(response);
      },
      error: function(xhr, status, error) {
        console.log("Error loading feedbacks: " + error);
      }
    });
  });
</script>


<?php include "../base-end.php" ?> 
