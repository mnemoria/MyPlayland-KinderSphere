<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

if (isset($_POST['addScore'])) {
    // Ensure that the necessary data is present
    if (isset($_POST['id'], $_POST['score'], $_POST['student_id'], $_POST['subject_id'])) {
        // Prepare the statement
        $stmt = mysqli_prepare($connection, "UPDATE `activity_info` SET activity_score = ? WHERE id = ? AND student_id = ? AND subject_id = ?");

        if (!$stmt) {
            die('Failed to prepare statement.');
        }

        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, 'siii', $score, $id, $student_id, $subject_id);

        // Loop through the submitted scores and update the database
        $scores = $_POST['score'];
        $student_ids = $_POST['student_id'];
        $subject_ids = $_POST['subject_id'];
        foreach ($scores as $index => $score) {
            $id = mysqli_real_escape_string($connection, $_POST['id'][$index]);
            $score = mysqli_real_escape_string($connection, $score);
            $student_id = mysqli_real_escape_string($connection, $student_ids[$index]);
            $subject_id = mysqli_real_escape_string($connection, $subject_ids[$index]);

            // Execute the statement
            if (!mysqli_stmt_execute($stmt)) {
                die('Query failed: ' . mysqli_error($connection));
            }
        }

        // Close the statement
        mysqli_stmt_close($stmt);

        // Optionally, you can redirect to a success page after the updates
        header('Location: success_page.php');
        exit;
    } else {
        // Handle the case when the necessary data is missing
        die('Incomplete data for updating scores.');
    }
}
?>




<div class="container">
    <!-- Accordion to list activities per subject -->
    <div id="subject-accordion">

        <!-- Subjects -->
        <div class="card">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

            if (isset($_SESSION['teacher_id'])) {
                $teacher_id = $_SESSION['teacher_id'];

                $query = mysqli_query($connection, "SELECT s.id, s.subject_code, s.subject_name, a.activity_num, a.activity_name, a.activity_desc, a.activity_score, a.activity_total_pts, a.date 
                    FROM teacher_info t
                    JOIN class_info c ON t.id = c.teacher_id
                    JOIN subject_info s ON c.level_code = s.class_id
                    LEFT JOIN activity_info a ON s.id = a.subject_id
                    WHERE t.id = '$teacher_id';
                    ") or die('query failed');

                if (mysqli_num_rows($query) > 0) {
                    while ($fetch_info = mysqli_fetch_assoc($query)) {
                        $subject_id = $fetch_info['id']; // Assuming the ID column exists in the subject_info table
                        $subject_code = $fetch_info['subject_code'];
                        $subject_name = $fetch_info['subject_name'];
                        ?>

                        <div class="card-header" id="subject-<?php echo $subject_id; ?>-heading">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#subject-<?php echo $subject_id; ?>-collapse" aria-expanded="true" aria-controls="subject-<?php echo $subject_id; ?>-collapse">
                                    <h5 class="m-0 font-weight-bold text-success"><?php echo $subject_code; ?> - <?php echo $subject_name; ?></h5>
                                </button>
                            </h2>
                        </div>
                        <div id="subject-<?php echo $subject_id; ?>-collapse" class="collapse show" aria-labelledby="subject-<?php echo $subject_id; ?>-heading" data-parent="#subject-accordion">
                            <div class="card-body">
                                <!-- Activities -->
                                <div class="activity">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-9">
                                                <h6 class="m-0 font-weight-bold text-dark">Activity <?php echo $fetch_info['activity_num']; ?>: <?php echo $fetch_info['activity_name']; ?></h6>
                                                <p class="text-muted mt-2"><?php echo $fetch_info['activity_desc']; ?></p>
                                            </div>
                                            <div class="col-3">
                                                <p class="text-muted mt-2 ml-4">Date Added: <?php echo $fetch_info['date']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Table to display student data -->
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="activityTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 250px;">Student Number</th>
                                                <th style="width: 250px;">Lastname</th>
                                                <th style="width: 250px;">Firstname</th>
                                                <th style="width: 350px;">Score</th>
                                            </tr>
                                        </thead>
                                        <!-- ... (existing PHP code) ... -->

                                            <tbody id="activityTableBody">
                                                <?php
                                                // Fetch student data for this activity
                                                $student_query = mysqli_query($connection, "SELECT s.lrn, s.lastname, s.firstname, act.id, act.activity_num, act.activity_total_pts, act.activity_score, act.date, act.subject_id, act.student_id
                                                    FROM student_info s
                                                    JOIN class_info c ON s.class_id = c.id
                                                    LEFT JOIN activity_info act ON s.id = act.student_id AND act.activity_num = '".$fetch_info['activity_num']."' AND act.subject_id = '$subject_id'
                                                    JOIN subject_info subj ON c.level_code = subj.class_id
                                                    JOIN teacher_info t ON c.teacher_id = t.id
                                                    WHERE t.id = '$teacher_id' AND subj.id = '$subject_id';                                            
                                                    ") or die('query failed');

                                                if (mysqli_num_rows($student_query) > 0) {
                                                    while ($fetch_student = mysqli_fetch_assoc($student_query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $fetch_student['lrn']; ?></td>
                                                        <td><?php echo $fetch_student['lastname']; ?></td>
                                                        <td><?php echo $fetch_student['firstname']; ?></td>
                                                        <td>
                                                            <form method="post" class="updateForm" data-student-id="<?php echo $fetch_student['id']; ?>">
                                                                <div class="container">
                                                                    <div class="row ml-4 pl-4">
                                                                        <div class="col-6">
                                                                            <input class="form-control" type="hidden" name="subject_id[]" placeholder="" value="<?php echo $fetch_student['subject_id']; ?>">
                                                                            <input class="form-control" type="hidden" name="student_id[]" placeholder="" value="<?php echo $fetch_student['student_id']; ?>">
                                                                            <input class="form-control" type="hidden" name="id[]" placeholder="" value="<?php echo $fetch_student['id']; ?>">
                                                                            <input class="form-control" type="text" name="score[]" placeholder="" value="<?php echo $fetch_student['activity_score']; ?>">
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <button class="btn btn-success btn-edit d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" type="submit" name="addScore" value=""><i class="fa fa-plus"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>

                                            <!-- ... (existing PHP code) ... -->

                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr class="divider my-0">
                    <?php
                    }
                } else {
                    echo '<p class="ml-5 mt-3 text-muted">There are no activities yet for this subject.</p>';
                }

                // Reset the subject_id variable after the loop
                $subject_id = '';
            } else {
                echo '<p class="empty">teacher_id not set!</p>';
            }
            ?>
        </div>
    </div>
</div>


<!-- ... (existing HTML code) ... -->

<!-- Add this JavaScript code after the HTML content -->
<script>
    // Function to handle form submission
    function handleSubmitForm(studentId, event) {
        // Prevent the form from being submitted through the default action
        event.preventDefault();

        // Get the correct form based on the student ID
        var form = document.querySelector(`form.updateForm[data-student-id="${studentId}"]`);
        if (!form) return; // Form not found

        // Use AJAX to submit the form data to the PHP script
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response, if necessary
                // For example, you could show a success message

                // Optional: Toggle the collapsible section to remain open
                var collapsibleSection = document.getElementById(`subject-<?php echo $subject_id; ?>-collapse`);
                if (collapsibleSection.classList.contains('show')) {
                    collapsibleSection.classList.remove('show');
                } else {
                    collapsibleSection.classList.add('show');
                }
            }
        };
        xhr.open(form.method, form.action, true);
        xhr.send(formData);
    }

    // Add event listeners to all forms with the class "updateForm"
    var updateForms = document.querySelectorAll('form.updateForm');
    updateForms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            // Extract student ID from the form's data attribute
            var studentId = form.getAttribute('data-student-id');
            // Call the handleSubmitForm function with the student ID
            handleSubmitForm(studentId, event);
        });
    });
</script>
