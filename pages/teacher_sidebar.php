<input type="checkbox" id="check">
<!--header area start-->
<header>
    
    <div class="left_area">
        <label for="check">
            <i class="fa fa-bars" id="sidebar_btn"></i>
        </label>
    </div>
    <div class="right_area">
        
    </div>
</header>
<!--header area end-->
<!--mobile navigation bar end-->
<!--sidebar start-->
<div class="sidebar">
    <div class="profile_info">
        <!-- <img src="https://i.imgur.com/iQpdHb2.jpg" class="profile_image" alt=""> -->
        <h4>KINDERSPHERE</h4>
    </div>
    <a href="teacher_dashboard.php " class="<?php if($page = 'dashboard') echo 'active' ?>"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
    <a href="teacher_attendance.php "  class="<?php if($page = 'dashboard') echo 'active' ?>"><i class="fa-regular fa-calendar-check"></i></i><span>Attendance</span></a>
    <a href="activities.php"  class="<?php ?>"><i class="fa-solid fa-pen"></i><span>Activities</span></a>
    <a href="learners_profile.php" class="<?php ?>"><i class="fa-solid fa-address-card"></i><span>Learners Profiles</span></a>
    <a href="report.php"  class="<?php ?>"><i class="fa fa-table"></i><span>Report</span></a>

</div>
<!--sidebar end-->

