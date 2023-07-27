<?php
// Assuming you have already established a database connection
// Replace 'your_database_connection' with your actual database connection code

session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

// Assuming you have already retrieved the teacher's class ID from the session or any other means
// Replace $_SESSION['teacher_class_id'] with the actual variable that holds the teacher's class ID
if(isset($_SESSION['class_id'])){
    $teacher_class_id = $_SESSION['class_id'];


    // Fetch feedbacks from the database for the teacher's class only
    $sql = "SELECT s.firstname, s.lastname, s.email, f.feedback_text, f.date_added 
        FROM
        student_info s
        INNER JOIN
        feedback_table f ON s.id = f.student_id AND s.class_id = ?;";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $teacher_class_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $firstname = $row["firstname"];
          $lastname = $row["lastname"];
          $email = $row["email"];
          $feedback_text = $row["feedback_text"];
          $date_added = $row["date_added"];
      
          // Format the date if needed (e.g., $formatted_date = date("Y-m-d", strtotime($date_added));)
      
          // Display the student information and feedback
          echo '<div class="card mb-3">';
          echo '  <div class="card-body">';
          echo '    <p class="card-text">' . $feedback_text . '</p>';
          echo '  </div>';
          echo '  <div class="card-footer"><small>Date Added: ' . $date_added . '</small></div>';
          echo '</div>';
        }
      } else {
        echo '<p>No feedbacks found.</p>';
      }

}


?>
