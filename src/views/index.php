  

<?php
include('base/start.php');
include('base/navbar.php');
?>

<!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">
    <?php
        include('base/sidebar.php')
    ?>


    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">


        <!-- General Report -->
        <?php
        @include('index/generalReport.html');
        
        // <!-- End General Report -->

        // <!-- strat Analytics -->
        @include('index/analytics-1.html');
        // <!-- end Analytics -->

        // <!-- Sales Overview -->
        @include('index/salesOverview.html');
        // <!-- end Sales Overview -->

        // <!-- start numbers -->
        @include('index/numbers.html');
        // <!-- end nmbers -->

        // <!-- start quick Info -->
        @include('index/quickInfo.html');
        // <!-- end quick Info -->
        ?>

    </div>
    <!-- end content -->

</div>
<!-- end wrapper -->

<?php

 @include('base/end.php');

?>