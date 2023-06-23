<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
        <a class="nav-link" href="/index.php">
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
        <a class="nav-link" href="attendance.php">
            <i class="fas fa-fw fa-calendar-check"></i>
            <span>Attendance</span></a>
    </li>

    <!-- Nav Item - Activities -->
    <li class="nav-item <?php if ($page == 'activities')
        echo 'active' ?>">
        <a class="nav-link" href="activities.php">
            <i class="fas fa-fw fa-lightbulb"></i>
            <span>Activities</span></a>
    </li>

    <!-- Nav Item - Announcements -->
    <li class="nav-item <?php if ($page == 'announcements')
        echo 'active' ?>">
        <a class="nav-link" href="announcements.php">
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
        <a class="nav-link" href="profiles.php">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Profiles</span></a>
    </li>

    <!-- Nav Item - Report -->
    <li class="nav-item <?php if ($page == 'report')
        echo 'active' ?>">
        <a class="nav-link" href="report.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Report</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->