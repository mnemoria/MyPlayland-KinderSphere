<?php include "../base-start.php" ?>

<link rel="stylesheet" type="text/css" href="style.css"/>
<script src="announcement.js"></script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Announcements</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Announcements -->
<input type="hidden" name="class_id" value="<?php echo $_SESSION['class_id']; ?>">
<div id="fetch_post">
</div>

<?php include "../base-end.php" ?> 