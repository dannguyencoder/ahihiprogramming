<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin/index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Ahihi Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/admin/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Admin</span>
        </a>
        <a class="nav-link" href="/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Courses Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Courses</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Courses Management</h6>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/courses/courses_view.php">View Courses</a>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/courses/courses_add.php">Add Course</a>
            </div>
        </div>
    </li>


    <!-- Video Groups Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Video Groups</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Video Groups Management</h6>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/video_groups/video_groups_view.php">View Video
                    Groups</a>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/video_groups/video_groups_add.php">Add Video
                    Group</a>
            </div>
        </div>
    </li>


    <!-- Videos Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
           aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Videos</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Videos Management</h6>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/videos/videos_view.php">View Videos</a>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/videos/videos_add.php">Add Video</a>
            </div>
        </div>
    </li>


    <!-- Files Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true"
           aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Files</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Files Management</h6>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/files/files_view.php">View Files</a>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/files/files_add.php">Add File</a>
            </div>
        </div>
    </li>


    <!-- Users Management -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true"
           aria-controls="collapseThree">
            <i class="fas fa-fw fa-cog"></i>
            <span>Users</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Users Management</h6>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/users/users_view.php">View Users</a>
                <a class="collapse-item" href="<?= SERVER_PATH ?>pages/users/users_add.php">Add User</a>
            </div>
        </div>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>

