<!-- Sidebar -->
<style>
    li {
        margin-top: 5px;
    }

    .navbar-nav span {
        color: #377557;
        font-weight: bold;
    }

    .navbar-nav .nav-item.active a, .navbar-nav .nav-item.active a i, .navbar-nav .nav-item.active a span {
        color: white !important;
        background-color: #377557;
    }
</style>

<ul class="navbar-nav sidebar" style="background-color: white; height:100%">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2" href="../dashboard/index.php">
        <div class="sidebar-brand-icon">
            <img src = "../../assets/logo.png" height = "50">
        </div>
        <div class="sidebar-brand-text mx-2" style="color: #377557;">KinderSphere</div>
    </a>

    <!-- Dashboard -->
    <li class="nav-item <?php if ($page == 'dashboard') echo 'active' ?> mt-3">
        <a class="nav-link" href="../dashboard/index.php">
            <i class='bx bxs-dashboard' style='color:#377557; font-size: 18px;'></i>
            <span style="font-size: 15px;">Dashboard</span>
        </a>
    </li>

    <!-- Course -->
    <li class="nav-item <?php if ($page == 'course') echo 'active' ?>">
        <a class="nav-link" href="../course/index.php">
            <i class='bx bxs-book-alt' style='color:#377557; font-size: 18px;'></i>
            <span style="font-size: 15px;">Course</span>
        </a>
    </li>

    <!-- Subjects -->
    <li class="nav-item <?php if ($page == 'subjects') echo 'active' ?>">
        <a class="nav-link" href="../subjects/index.php">
            <i class='bx bx-clipboard' style='color:#377557; font-size: 18px;'></i>
            <span style="font-size: 15px;">Subjects</span>
        </a>
    </li>

    <!-- Sections -->
    <li class="nav-item <?php if ($page == 'class') echo 'active' ?>">
        <a class="nav-link" href="../sections/index.php">
            <i class='bx bxs-group' style='color:#377557; font-size: 18px;'></i>
            <span style="font-size: 15px;">Class</span>
        </a>
    </li>

    <!-- Teachers -->
    <li class="nav-item <?php if ($page == 'teachers') echo 'active' ?>">
        <a class="nav-link" href="../teachers/index.php">
            <i class='bx bxs-id-card' style='color:#377557; font-size: 18px;'></i>
            <span style="font-size: 15px;">Teachers</span>
        </a>
    </li>

    <!-- Students -->
    <li class="nav-item <?php if ($page == 'students') echo 'active' ?>">
        <a class="nav-link" href="../students/index.php">
            <i class='bx bxs-user' style='color:#377557; font-size: 18px;'></i>
            <span style="font-size: 15px;">Students</span>
        </a>
    </li>

</ul>