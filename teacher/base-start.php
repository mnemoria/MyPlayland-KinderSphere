<?php include __DIR__ . '/../base/start.php'; 



if(!$_SESSION['teacher_login']) {
    header('location: ../');
}



?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include __DIR__ . '/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include __DIR__ . '/../base/topbar.php'?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    

             