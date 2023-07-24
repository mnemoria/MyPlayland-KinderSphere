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
                                                    <form method="post" id="scoreForm">
                                                        <div class="container">
                                                            <div class="row ml-4 pl-4">
                                                                <div class="col-6">
                                                                    <input class="form-control" type="hidden" name="subject_id" placeholder="" value="<?php echo $fetch_student['subject_id']; ?>">
                                                                    <input class="form-control" type="hidden" name="student_id" placeholder="" value="<?php echo $fetch_student['student_id']; ?>">
                                                                    <input class="form-control" type="hidden" name="id" placeholder="" value="<?php echo $fetch_student['id']; ?>">
                                                                    <input class="form-control" type="text" name="score" placeholder="">
                                                                </div>
                                                                <div class="col-2"> 
                                                                    <p class="btn btn-success btn-edit d-none d-sm-inline-block btn btn-sm btn-success shadow-sm " type="" name="addScore" value=""><i class="fa fa-plus"></i></p>
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
