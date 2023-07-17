<?php
$title = 'Page Not Found';
$page = '404';

include __DIR__ . '/base/start.php';


?>
<!-- Page Wrapper -->
<div id="wrapper">

    <?php 
    if (isset($_SESSION["admin_login"]) || isset($_SESSION["teacher_login"]) || isset($_SESSION["student_login"])) //check condition admin login if not direct back to index.php page
    {
        $_SESSION['isLoggedIn'] = true;
    } else {
        $_SESSION['isLoggedIn'] = false;
    }
    
    if ($_SESSION['isLoggedIn']){
        include __DIR__ . '/base/sidebar.php';
    }
    
    
    ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php 
            
            if ($_SESSION['isLoggedIn']){
                include __DIR__ . '/base/topbar.php';
        
            }
            
            ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- 404 Error Text -->
                <div class="text-center">
                    <div class="error mx-auto">404</div>
                    <p class="lead text-gray-800 mb-5">Page Not Found</p>
                    <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                    <a href="index.php">&larr; Back to Dashboard</a>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php include __DIR__ . '/base/end.php' ?>