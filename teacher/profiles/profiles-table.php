<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-success">Students</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Sex</th>
                        <th>Status</th>
                        <th>Birthdate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>Sex</th>
                        <th>Status</th>
                        <th>Birthdate</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php

                    require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

                    $email = $_SESSION["teacher_login"];
                    $role = $_SESSION["role"];
                    $table = $role;
                    $query = mysqli_query($connection, "SELECT * FROM $table ORDER BY name") or die('query failed');


                    if (mysqli_num_rows($query) > 0) {
                        while ($fetch_student = mysqli_fetch_assoc($query)) {

                            $sex = $fetch_student['sex'];
                            // $enrolled = $fetch_student['enrolled'] ? true : false;
                    
                            ?>

                            <tr>
                                <td>
                                    <?php echo $fetch_student['name'] ?>
                                </td>
                                <td>
                                    <?php echo $fetch_student['surname'] ?>
                                </td>
                                <td>
                                    <?php echo $fetch_student['email'] ?>
                                </td>
                                <td>
                                    <?php echo $fetch_student['sex'] ?>
                                </td>
                                <td>
                                        <span class="badge badge-success">Enrolled</span>
                                        <!-- <span class="badge <? // php if($status) echo 'badge-success'; else 'badge-danger' ?>"><?php //echo $status ?></span> -->
                                </td>
                                <td>
                                    <?php echo $fetch_student['birthdate'] ?>
                                </td>
                                <td>
                                    <button  class="btn btn-warning btn-edit" data-email="<?php echo $fetch_student['email'];?>">
                                    <i class="fa fa-pen"></i>
                                    </button>
                                </td>
                            </tr>

                            <?php

                        }




                    } else {
                        echo '<p class="empty">no orders placed yet!</p>';
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
</div>