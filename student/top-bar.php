<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">


            <div class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                <?php
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

                    $role = $_SESSION["role"];
                    $current = $role . '_login';
                    $email = $_SESSION[$current];
                    $table = $role . '_info';
                    $query = mysqli_query($connection, "SELECT * FROM $table WHERE email = '$email'") or die('query failed');

                    if (mysqli_num_rows($query) > 0) {
                        while ($fetch_data = mysqli_fetch_assoc($query)) {
                            $firstname = $fetch_data['firstname'];
                            $profile_picture = $fetch_data['picture']; // Assuming the image data is stored in the 'picture' column

                            echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">';
                            echo $firstname;
                            echo '</span>';

                            // Display the image if available
                            if (!empty($profile_picture)) {
                                echo '<img class="img-profile rounded-circle" src="data:image/jpeg;base64,' . base64_encode($profile_picture) . '">';
                            } else {
                                // Display a default image if no profile picture is available
                                echo '<img class="img-profile rounded-circle" src="https://img.freepik.com/free-icon/user_318-159711.jpg">';
                            }
                        }
                    } else {
                        echo '<p class="empty">No orders placed yet!</p>';
                    }
                    ?>
               
            </div>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo '/playland/student/profiles' ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="<?php echo '/playland/student/activities' ?>">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->

<!-- Logout Modal-->


<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="<?php echo __DIR__ . '../backend/logout.php'; ?>">
                <div class="modal-header">
                    <?


                    ?>
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?php echo '../../backend/logout.php'; ?>"
                        name="btn_logout">Logout</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- include __DIR__ . '/base/start.php'; -->