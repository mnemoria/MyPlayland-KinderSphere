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

                $query = mysqli_query($connection, "SELECT s.id AS subject_id, s.subject_code, s.subject_name, s.date_added AS subject_date
                    FROM student_info st
                    JOIN class_info c ON st.class_id = c.id
                    JOIN subject_info s ON c.id = s.class_id
                    WHERE st.id = '$student_id';") or die('query failed');

                if (mysqli_num_rows($query) > 0) {
                    while ($fetch_activities = mysqli_fetch_assoc($query)) {
                        $subject_id = $fetch_activities['subject_id']; // Assuming the ID column exists in the subject_info table
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
                        <?php 

                            $query1 = mysqli_query($connection, "SELECT activity_num, activity_name, activity_desc, activity_total_pts, date, activity_score
                            FROM activity_info
                            WHERE student_id = '$student_id' AND subject_id = '$subject_id';                                                        
                            ") or die('query failed');

                            if (mysqli_num_rows($query1) > 0) {
                                while ($fetch_activities = mysqli_fetch_assoc($query1)) {
                                    ?>
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
                            }
                        ?>

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