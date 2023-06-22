<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php 

    $title = "Dashboard";
    $page = 'dashboard';
    include_once "head.php"; 
    
?>
<body class="bg-light">
    <?php include 'teacher_sidebar.php'?>
    <main class='content'>
        <div class="header">
            <h3>Overview</h3>
            <p>Hello <b>Teacher Name!</b></p>
        </div>
        <div class="card attendance-container p-3 py-4 mb-2 bg-white text-red">
            <h6 class="mb-3">Attendance Overview</h6>
            <p class="text-sm">July 36, 2032</p>
            <div class="attendance-card-container d-flex justify-content-center">
                <div class="attendance-card d-flex flex-column align-items-center px-5 py-2">
                    <div class="">

                    </div>
                    <h1>30</h1>
                    <p class="text-secondary">Present</p>
                </div>
                <div class="attendance-card d-flex flex-column align-items-center px-5 py-2">
                    <h1>2</h1>
                    <p class="text-secondary">Absent</p>
                </div>
            </div>
        </div>

        </main>
</body>
</html>
