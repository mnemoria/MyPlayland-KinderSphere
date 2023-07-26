
<div class="container">
    <!-- Accordion to list activities per subject -->
    <div id="subject-accordion">

        <!-- Subjects -->
        <div class="card">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

            if (isset($_SESSION['teacher_id'])) {
                $teacher_id = $_SESSION['teacher_id'];

                $query = mysqli_query($connection, "SELECT s.id AS subject_id, s.subject_code, s.subject_name, s.date_added AS subject_date
                    FROM teacher_info t
                    JOIN class_info c ON t.id = c.teacher_id
                    JOIN subject_info s ON c.level_code = s.class_id
                    WHERE t.id = '$teacher_id';
                    ") or die('query failed');

                if (mysqli_num_rows($query) > 0) {
                    while ($fetch_info = mysqli_fetch_assoc($query)) {
                        $subject_id = $fetch_info['subject_id']; // Assuming the ID column exists in the subject_info table
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

                        <?php 

                            $query1 = mysqli_query($connection, "SELECT a.activity_num, a.activity_name, a.activity_desc, a.activity_total_pts, a.date, a.activity_score
                            FROM activity_info a
                            JOIN subject_info s ON a.subject_id = s.id
                            JOIN class_info c ON s.class_id = c.level_code
                            JOIN teacher_info t ON c.teacher_id = t.id
                            WHERE s.id = '$subject_id'
                            AND t.id = '$teacher_id';                            
                            ") or die('query failed');

                            if (mysqli_num_rows($query1) > 0) {
                                while ($fetch_students = mysqli_fetch_assoc($query1)) {
                                    ?>
                                        <div id="subject-<?php echo $subject_id; ?>-collapse" class="collapse show" aria-labelledby="subject-<?php echo $subject_id; ?>-heading" data-parent="#subject-accordion">
                                            <div class="card-body">
                                                <!-- Activities -->
                                                <div class="activity">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <h6 class="m-0 font-weight-bold text-dark">Activity <?php echo $fetch_students['activity_num']; ?>: <?php echo $fetch_students['activity_name']; ?></h6>
                                                                <p class="text-muted mt-2"><?php echo $fetch_students['activity_desc']; ?></p>
                                                            </div>
                                                            <div class="col-3">
                                                                <p class="text-muted mt-2 ml-4">Date Added: <?php echo $fetch_students['date']; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="divider my-0">
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
                echo '<p class="empty">teacher_id not set!</p>';
            }
            ?>
        </div>
    </div>
</div>

