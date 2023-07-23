<?php include "../base-start.php" ?>

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

            if (isset($_SESSION['student_id'])) {
                // Access the student_id
                $student_id = $_SESSION['student_id'];

                // Query to fetch subjects
                $query1 = mysqli_query($connection, "SELECT * FROM `subjects`") or die('query failed');
                if (mysqli_num_rows($query1) > 0) {
                    while ($fetch_subject = mysqli_fetch_assoc($query1)) {
                        $subject_id = $fetch_subject['subject_id'];
                        $subject_code = $fetch_subject['subject_code'];
                        $subject_name = $fetch_subject['subject_name'];
                        ?>

                        <div class="card-header" id="subject-<?php echo $subject_id; ?>-heading">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#subject-<?php echo $subject_id; ?>-collapse" aria-expanded="true" aria-controls="subject-<?php echo $subject_id; ?>-collapse">
                                    <h5 class="m-0 font-weight-bold text-success"><?php echo $subject_code; ?> - <?php echo $subject_name; ?></h5>
                                </button>
                            </h2>
                        </div>

                        <?php
                        // Query activities for the current subject_id and student_id
                        $query2 = mysqli_query($connection, "SELECT * FROM `activities` WHERE student_id = '$student_id' AND subject_id = '$subject_id'") or die('query failed');
                        if (mysqli_num_rows($query2) > 0) {
                            while ($fetch_activities = mysqli_fetch_assoc($query2)) {
                                $teacher_id = $fetch_activities['teacher_id'];
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
                        } else {
                            echo '<p class="ml-5 mt-3 text-muted">There are no activities yet for this subject.</p>';
                        }

                        $subject_id = '';
                    }
                } else {
                    echo '<p class="empty">no subjects yet!</p>';
                }
            } else {
                echo '<p class="empty">student_id not set!</p>';
            }
        ?>

        </div>
    </div>
</div>

<script src="script.js"></script>

<?php include "../base-end.php" ?>