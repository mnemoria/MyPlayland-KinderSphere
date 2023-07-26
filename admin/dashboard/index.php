<?php
    include "../../base/start.php";
    include('../../backend/server.php');

    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit();
    } 

    $page = "dashboard";
?>

<link rel="stylesheet" type="text/css" href="../css/styles.css" />
<style>
    a:hover {
        text-decoration: none;
    }

    a {
        color: black;
    }
</style>

<div class="container-fluid" style="margin: 0; padding: 0; background-color: #F2F2F2">
    <div class="d-flex">
        <div class="flex-grow-0">
            <?php include "../includes/sidebar.php"; ?>
        </div>
        <div class="flex-grow-1">
            <?php include "../includes/topbar.php"; ?>
            
            <!-- Header -->
            <header class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-12 mt-2">
                        <h2 class="text-uppercase">Dashboard</h2>
                        <p>Welcome to the Admin Dashboard</p>
                    </div>
                </div>
            </header>

            <section class="container-fluid">
                <div class="mt-3 row">
                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-primary mb-4">
                            <div class="card-body text-white">
                                Total Students
                                <div class="mt-1">
                                    <?php
                                        $query = "SELECT * FROM student_info WHERE status = 'Enrolled'";
                                        $stmt = mysqli_query($connection, $query);
                                        $total = mysqli_num_rows($stmt);
                                        echo '<h3 class="mb-0"> '.$total. '</h3>';
                                    ?>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small stretched-link link-success" href="../students/index.php">View Details</a>
                                <div><i class='bx bxs-chevron-right' ></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-secondary mb-4">
                            <div class="card-body text-white">
                                Total Teachers
                                <div class="mt-1">
                                    <?php
                                        $query = "SELECT * FROM teacher_info WHERE employment_status = 'Full-time' OR employment_status = 'Part-time'";
                                        $stmt = mysqli_query($connection, $query);
                                        $total = mysqli_num_rows($stmt);
                                        echo '<h3 class="mb-0"> '.$total. '</h3>';
                                    ?>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small stretched-link link-success" href="../teachers/index.php">View Details</a>
                                <div><i class='bx bxs-chevron-right' ></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <div class="card bg-success mb-4">
                            <div class="card-body text-white">
                                Total Classes
                                <div class="mt-1">
                                    <?php
                                        $query = "SELECT * FROM class_info WHERE status = 'Active'";
                                        $stmt = mysqli_query($connection, $query);
                                        $total = mysqli_num_rows($stmt);
                                        echo '<h3 class="mb-0"> '.$total. '</h3>';
                                    ?>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small stretched-link link-success" href="../sections/index.php">View Details</a>
                                <div><i class='bx bxs-chevron-right' ></i></div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row mt-3">
                <div class="col-xl-2 col-md-6"></div>

                <div class="col-xl-4 col-md-6">
                    <div class="card bg-info mb-4">
                        <div class="card-body text-white">
                            Total Courses
                            <div class="mt-1">
                                <?php
                                    $query = "SELECT * FROM course_info WHERE status = 'Active'";
                                    $stmt = mysqli_query($connection, $query);
                                    $total = mysqli_num_rows($stmt);
                                    echo '<h3 class="mb-0"> '.$total. '</h3>';
                                ?>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link link-success" href="../course/index.php">View Details</a>
                            <div><i class='bx bxs-chevron-right' ></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card bg-danger mb-4">
                        <div class="card-body text-white">
                            Total Subjects
                            <div class="mt-1">
                                <?php
                                    $query = "SELECT * FROM subject_info WHERE status = 'Active'";
                                    $stmt = mysqli_query($connection, $query);
                                    $total = mysqli_num_rows($stmt);
                                    echo '<h3 class="mb-0"> '.$total. '</h3>';
                                ?>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small stretched-link link-success" href="../subjects/index.php">View Details</a>
                            <div><i class='bx bxs-chevron-right' ></i></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-2 col-md-6"></div>
            </div>
        </div>
    </div>
</div>
    

<?php
    include "../includes/footer.php";
?>