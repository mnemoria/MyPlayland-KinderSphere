<?php include "../base-start.php" ?>

<link rel="stylesheet" type="text/css" href="style.css"/>
<script src="announcement.js"></script>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Announcements</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Add announcements -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="post" action="">
            <div class="mb-3"></div>
            <textarea name="post_heading" id="txt_heading" placeholder="Heading"></textarea>
            <textarea name="post_content" id="txt_content" placeholder="Content"></textarea>
            <input type="text" name="class_id" value="<?php echo $_SESSION['class_id']; ?>">
            <button class="btn btn-success" onClick="createPost();">Post</button>
        </form>
    </div>
</div>

<!-- Announcements -->
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between py-3">
        <h4 class="m-0 font-weight-bold text-success" id="fetch_heading"></h4> 
    </div>
    
    <div class="card-body" id="fetch_content">

    </div>
</div>

<?php include "create_post.php" ?>
<?php include "../base-end.php" ?> 