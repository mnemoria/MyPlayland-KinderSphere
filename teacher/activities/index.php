<?php include "../base-start.php" ?>

<link rel="stylesheet" href="styles.css">

<div class="container">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Subjects</h1>
        <div class="mr-2">
            <button class="btn btn-success btn-edit d-none d-sm-inline-block btn btn-sm btn-success shadow-sm mr-2" id="createNewActBtn">
                <i class="fa fa-plus"></i> Create Activity
            </button>
        </div>
    </div>

</div>

<?php include 'activities.php' ?>

<?php include "add-activity-modal.php" ?>

<script src="scripts.js"></script>

<?php include "../base-end.php" ?>