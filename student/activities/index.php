<?php include "../base-start.php"; ?>

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Activities</h1>
    </div>

    <!-- Accordion to list activities per subject -->
    <div id="subject-accordion">

        <!-- Subjects -->
        <div class="card">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

            if (isset($_SESSION['student_id']) && isset($_SESSION['class_id'])) {
                // Access the student_id and class_id
                $student_id = $_SESSION['student_id'];
                $class_id = $_SESSION['class_id'];

                $query = mysqli_query($connection, "SELECT s.firstname, c.class_name, su.id, su.subject_code, su.subject_name, a.activity_num, a.activity_name, a.activity_desc, a.activity_score, a.activity_total_pts, a.date
                    FROM student_info s
                    INNER JOIN class_info c ON s.class_id = c.id
                    INNER JOIN teacher_info t ON c.teacher_id = t.id
                    INNER JOIN subject_info su ON c.level_code = su.class_id 
                    LEFT JOIN activity_info a ON s.class_id = a.student_id AND su.id = a.subject_id
                    WHERE s.id = '$student_id'
                    AND c.id = '$class_id';
                ") or die('query failed');

                if (mysqli_num_rows($query) > 0) {
                    while ($fetch_activities = mysqli_fetch_assoc($query)) {
                        $subject_id = $fetch_activities['id']; // Assuming the ID column exists in the subject_info table
                        $subject_code = $fetch_activities['subject_code'];
                        $subject_name = $fetch_activities['subject_name'];
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
                                                <h6 class="m-0 font-weight-bold text-dark">Activity <?php echo $fetch_activities['activity_num']; ?>: <?php echo $fetch_activities['activity_name']; ?></h6>
                                                <p class="text-muted mt-2"><?php echo $fetch_activities['activity_desc']; ?></p>
                                            </div>
                                            <div class="col-3 pl-5 mt-3">
                                                <a class="btn btn-primary">Score: <?php echo $fetch_activities['activity_score']; ?> / <?php echo $fetch_activities['activity_total_pts']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="divider my-0">
                        </div>

                    <?php
                    }
                } else {
                    echo '<p class="ml-5 mt-3 text-muted">There are no activities yet for this subject.</p>';
                }

                // Reset the subject_id variable after the loop
                $subject_id = '';
            } else {
                echo '<p class="empty">student_id or class_id not set!</p>';
            }
            ?>
        </div>
    </div>
</div>

<?php include "../base-end.php"; ?>
