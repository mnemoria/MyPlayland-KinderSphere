<?php include "../base-start.php" ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header">
        <div class="pl-2 pr-2 row d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-success">Recent Activities</h6>
            <?php ?>
        </div>
    </div>
    <div class="card-body" id="recentActivityContainer">
        <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

            if (isset($_SESSION['student_id'])) {
                $student_id = $_SESSION['student_id'];

                $query = mysqli_query($connection, "SELECT s.lrn, a.activity_num, a.activity_name, a.activity_total_pts, a.date, a.activity_score FROM activity_info a JOIN student_info s ON a.student_id = s.id WHERE student_id = '$student_id';
                    ") or die('query failed');

                if (mysqli_num_rows($query) > 0) {
                    while ($fetch_info = mysqli_fetch_assoc($query)) {
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="activityTable" width="70%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="">Student Number</th>
                                                <th style="width: 150px">Activity Number</th>
                                                <th style="">Activity Name</th>
                                                <th style="">Date Given</th>
                                                <th style="width: 150px">Total Points</th>
                                                <th style="width: 100px">Score</th>
                                            </tr>
                                        </thead>
                                        <!-- ... (existing PHP code) ... -->

                                            <tbody id="activityTableBody">
                                                    <tr>
                                                        <td><?php echo $fetch_info['lrn']; ?></td>
                                                        <td><?php echo $fetch_info['activity_num']; ?></td>
                                                        <td><?php echo $fetch_info['activity_name']; ?></td>
                                                        <td><?php echo $fetch_info['date']; ?></td>
                                                        <td><?php echo $fetch_info['activity_total_pts']; ?></td>
                                                        <td>
                                                            <h6 class="text-success"><?php echo $fetch_info['activity_score']; ?></h6>                                                                                                               </td>
                                                    </tr>                                        
                                            </tbody>
                                </table>
                            </div>
                        <?php
                    }
                }
            }
        ?>
    </div>
</div>


        <?php //include 'attendance-stats.php' ?>
    </div>
</div>
<!-- Content Row -->

<?php
// include __DIR__ . '/../base/table.php'
?>
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">My Playland Learning Center, Inc.</h6>
            </div>
            <div class="card-body">
                <p> <br> My Playland Learning Center, Inc. is an officially recognized educational institution
                     approved by the Securities and Exchange Commission with the Company Reg. No. CN 00308933. 
                     It also holds a DepEdNCR permit (P-026). The center's curriculum is distinctive as it combines
                      academic excellence with Christian education to foster a well-rounded development of a child's
                       mental, spiritual, emotional, social, and physical aspects. The center follows a balanced and
                        personalized approach to enhance students' proficiency in both written and oral comprehension</p>
                <p class="mb-0"> In addition to academic knowledge, the center aims to instill strong moral values 
                    and personal discipline in children, with the assistance of competent and morally upright teachers. 
                    Since 1995, the center has partnered with parents and guardians to support children in realizing 
                    their full potential.</p>
            </div>
        </div>

        <!-- <div class="card shadow mb-4">
            Card Header - Dropdown
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Earnings Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            Card Body
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">Revenue Sources</h6>
                <!-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div> -->
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Direct
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Referral
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">School Events</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Storytelling and Puppet Show: "Adventures in the Jungle" <span class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Music and Movement Workshop: "Rhythms and Rhymes" <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Mini Science Fair: "Little Scientists Expo" <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Healthy Snack Making: "Yummy Tummy Treats" <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Recycling Art Project: "Eco-Heroes" <span class="float-right">Completed</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Color System -->
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-light text-black shadow">
                    <div class="card-body">
                        Light
                        <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Dark
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-lg-6 mb-4">

        <!-- Illustrations -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Recent Developments</h6>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <!-- <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                        src="img/undraw_posting_photo.svg" alt="..."> -->
                </div>
                <p>
                    One of its recent advancements to provide for educational needs is the
                    development of a centralized student information system. Admin, teachers, and
                    parents can access the site which provides great assitance for managing informations
                    and concerns.
                </p>
            </div>
        </div>

        <!-- Approach -->
        <!-- <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-success">Development Approach</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                    CSS bloat and poor page performance. Custom CSS classes are used to create
                    custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the
                    Bootstrap framework, especially the utility classes.</p>
            </div>
        </div> -->

    </div>
</div>

<script>
    function fetchRecentActivity() {
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var activityData = JSON.parse(this.responseText);
                displayRecentActivity(activityData);
            }
        };

        // Assuming you have the student_id as a JavaScript variable
        var student_id = <?php echo $_SESSION['student_id']; ?>;
        xhttp.open("GET", "get_recent_activity.php?student_id=" + student_id, true);
        xhttp.send();
    }

    function displayRecentActivity(activityData) {
        // Update the HTML container with the fetched activity data
        var recentActivityContainer = document.getElementById("recentActivityContainer");
        recentActivityContainer.innerHTML = "";

        if (activityData.length === 0) {
            // Handle the case when there are no recent activities
            recentActivityContainer.innerHTML = "<p>No recent activities found.</p>";
        } else {
            // Loop through the activity data and create HTML elements to display them
            for (var i = 0; i < activityData.length; i++) {
                var activityItem = document.createElement("div");
                activityItem.innerHTML = "<p>Activity Number: " + activityData[i].activity_num + "</p>" +
                    "<p>Activity Name: " + activityData[i].activity_name + "</p>" +
                    "<p>Description: " + activityData[i].activity_desc + "</p>" +
                    "<p>Total Points: " + activityData[i].activity_total_pts + "</p>" +
                    "<p>Date: " + activityData[i].date + "</p>" +
                    "<hr>";

                recentActivityContainer.appendChild(activityItem);
            }
        }
    }

    // Call the function to fetch and display recent activity on page load
    fetchRecentActivity();
</script>


<?php include "../base-end.php" ?>