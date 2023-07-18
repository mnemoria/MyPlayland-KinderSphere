<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo '/playland/teacher/home'?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KinderSphere</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($page == 'dashboard')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/teacher/home'?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Class
    </div>

    <!-- Nav Item - Attendance -->
    <li class="nav-item <?php if ($page == 'attendance')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/teacher/attendance/'?>">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Attendance</span></a>
    </li>

    <!-- Nav Item - Activities -->
    <li class="nav-item <?php if ($page == 'activities')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/teacher/activities/'?>">
            <i class="fas fa-fw fa-lightbulb"></i>
            <span>Activities</span></a>
    </li>

    <!-- Nav Item - Announcements -->
    <li class="nav-item <?php if ($page == 'announcements')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/teacher/announcements/'?>">
                <i class="fas fa-fw fa-bullhorn"></i>
                <span>Announcements</span>
        </a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Students
    </div>

    <!-- Nav Item - Profiles -->
    <li class="nav-item <?php if ($page == 'profiles')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/teacher/profiles/'?>">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Profiles</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item <?php if ($page == 'report')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/teacher/report/'?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Report</span></a>
    </li>


</ul>
<!-- End of Sidebar -->