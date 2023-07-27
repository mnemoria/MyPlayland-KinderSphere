<?php include "../base-start.php"; ?>


<div class="container">
  <div class="row mb-1">
    <div class="col-sm-12">
      <h1 class="d-sm-flex align-items-center justify-content-between mb-1">Concerns</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <p class="text-success">Note: All feedbacks will be sent directly to your email. Thank you.</p>
    </div>
  </div>
</div>


<div class="container mt-4">
  <form id="feedbackForm">
    <div class="form-group">
      <label for="feedbackTextarea">Type in your concerns</label>
      <textarea class="form-control" id="feedbackTextarea" name="feedback" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<script>
  $(document).ready(function() {
    // AJAX submit form
    $("#feedbackForm").submit(function(event) {
      event.preventDefault(); // Prevent default form submission
      var formData = $(this).serialize(); // Serialize form data

      $.ajax({
        url: "submit_feedback.php", // PHP script to handle the form submission
        type: "POST",
        data: formData,
        success: function(response) {
          alert(response); // Show response message
          // You can handle the response here, e.g., show a success message or refresh the page.
        }
      });
    });
  });
</script>

<?php include "../base-end.php"; ?>