<?php
    ob_start();

    include('../../base/start.php');
    include('../../backend/server.php');

    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php");
        exit();
    } 

    $page = "students";
    // Pamskie987 @Bladie1123
?>  

<link rel="stylesheet" href="../css/styles.css">
<script src="student.js"></script>

<!-- Main Content -->
<div class="container-fluid" style="margin: 0; padding: 0; background-color: #F2F2F2">
    <div class="d-flex">

        <!-- Sidebar -->
        <div class="flex-grow-0">
            <?php include "../includes/sidebar.php"; ?>
        </div>

        <!-- Topbar -->
        <div class="flex-grow-1">
            <?php include "../includes/topbar.php"; ?>
            
            <!-- Header -->
            <header class="container-fluid mt-4">
                <div class="row">
                    <div class="col-xl-6 col-md-4    mt-2">
                        <h2 class="text-uppercase">Student Accounts</h2>
                        <p id="total_count"></p>
                    </div>

                    <!-- Search box -->
                    <div class="col-xl-3 col-md-3 mt-2">
                        <div class="input-group">
                            <input type="search" id="searchInput" class="form-control rounded-left" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon" style="background-color: #377557; color: white; border-radius: 0 .25rem .25rem 0;">
                                <i class="fas fa-search" type="button"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Filter -->
                    <div class="col-xl-1 col-md-2 mt-2">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Status
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" value="All" onclick="changeContent('All')">All</a>
                                <a class="dropdown-item" value="Enrolled" onclick="changeContent('Enrolled')">Enrolled</a>
                                <a class="dropdown-item" value="Transferred" onclick="changeContent('Transferred')">Transferred</a>
                                <a class="dropdown-item" value="Graduated" onclick="changeContent('Graduated')">Graduated</a>
                            </div>
                        </div>
                    </div>

                    <!-- New Entry -->
                    <div class="col-xl-2 col-md-3 mt-2">
                        <button type="button" id="mbtn" class="btn btn-block" data-toggle="modal" data-target="#CreateStudent">
                            <i class='bx bx-plus' style='color:#ffffff'></i>
                            Add Student
                        </button>
                    </div>
                </div>
            </header>

            <!-- Table -->
            <div class="mx-4 mt-2">
                <table class="table table-hover table-light">
                    <thead style="background-color:#377557; color: white;">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email Address</th>
                            <th>Phone Number</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="table_data">
                        <!-- Fetch and display data -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <ul class="pagination justify-content-center" id="pagination"></ul>
        </div>
    </div>
</div>

<?php
    include "modal/add_student.php";
    include "modal/edit_student.php";
    include "modal/view_student.php";
    include "../includes/footer.php";
    
    ob_end_flush();
?>