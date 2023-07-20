<?php include "../base-start.php" ?>
<link rel="stylesheet" href="profiles.css">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Learner Profiles</h1>
    <button class="btn btn-success btn-edit d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" id="addNewStudentBtn">
        <i class="fa fa-plus"></i> Add New Student
    </button>
    <!-- <div class="col-sm-4"><a ><i class="mdi mdi-plus"></i> Add Member</a></div> -->
</div>

<?php include 'profiles-table.php' ?>


<!-- container -->

<?php include "profile-modal-add.php" ?>
<?php include "profile-modal-edit.php" ?>

<script src="script.js"></script>



<?php include "../base-end.php" ?>