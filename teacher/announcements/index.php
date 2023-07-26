<?php include "../base-start.php" ?>

<link rel="stylesheet" type="text/css" href="style.css"/>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Announcements</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Add announcements -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="post" action="">
            <div class="mb-3"></div>
            <textarea name="post_heading" id="txt_heading" placeholder="Heading"></textarea>
            <textarea name="post_content" id="txt_content" placeholder="Content"></textarea>
            <button class="btn btn-success">Post</button>
        </form>
    </div>
</div>

<!-- Announcements -->
<div class="card shadow mb-4">
    <div class="card-header d-flex justify-content-between py-3">
        <h4 class="m-0 font-weight-bold text-success">Heading</h6>
        <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" id="menu"><i class="fa fa-bars"></i></button> 
    </div>
    <div class="card-body">
        <p>Content: Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis eum neque possimus eveniet laborum! Fuga recusandae obcaecati eum placeat adipisci.</p>
    </div>
    <div class="card-header py-3" id="comment-box">
        <form method="post" action="">
            <div class="card-body py-1">
                <div class="d-flex justify-content-between">
                    <?php
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/playland/backend/server.php';

                    $email = $_SESSION["teacher_login"];
                    $role = $_SESSION["role"];
                    $table = $role . '_info' ;
                    $query = mysqli_query($connection, "SELECT * FROM $table WHERE email = '$email'") or die('query failed');
                    if (mysqli_num_rows($query) > 0) {
                        while ($fetch_name = mysqli_fetch_assoc($query)) {
                            ?>
                            <span class="mr-2 d-lg-inline text-gray-600 large">
                                <?php echo $fetch_name['name']; ?>
                            </span>
                            <?php
                        }
                    } else {
                        echo '<p class="empty">no orders placed yet!</p>';
                    }
                    ?>
                    <textarea name="post_comment" id="txt_comment" placeholder="Drop a comment"></textarea> 
                </div> 
                <div class="comment">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm d-flex" id="comment"><i class="fa fa-paper-plane"></i></button>  
                </div>  
            </div>      
        </form>    
    </div>
</div>


<?php include "../base-end.php" ?>