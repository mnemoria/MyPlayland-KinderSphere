<?php include "../base-start.php" ?>
<link rel="stylesheet" href="profile.css">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Learner Profiles</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-download fa-sm text-white-50" href="#custom-modal"
            class="btn btn-custom waves-effect waves-light mb-4" data-animation="fadein" data-plugin="custommodal"
            data-overlayspeed="200" data-overlaycolor="#36404a"></i> Add Learner</a>
    <!-- <div class="col-sm-4"><a ><i class="mdi mdi-plus"></i> Add Member</a></div> -->
</div>

<?php include 'profiles-table.php'?>



<!-- container -->

<?php include "profile-modal-edit.php" ?>



<?php include "../base-end.php" ?>