<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center"
       >
        <div class="d-flex align-items-center pt-3">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3 text-white white"  href="<?php echo '/playland/student/home' ?>"><div>KinderSphere</div></div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($page == 'dashboard')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/student/home' ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Activities -->
    <li class="nav-item <?php if ($page == 'activities')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/student/activities/' ?>">
            <i class="fas fa-fw fa-lightbulb"></i>
            <span>Activities</span></a>
    </li>

    <!-- Nav Item - Announcements -->
    <li class="nav-item <?php if ($page == 'announcements')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/student/announcements/' ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Announcements</span>
        </a>
    </li>

        <!-- Nav Item - Profiles -->
    <li class="nav-item <?php if ($page == 'profiles')
        echo 'active' ?>">
        <a class="nav-link" href="<?php echo '/playland/student/profiles/' ?>">
            <i class="fas fa-fw fa-address-card"></i>
            <span>Profiles</span></a>
    </li>

</ul>
<!-- End of Sidebar -->