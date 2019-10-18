<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/Course.php");
include("../../includes/classes/VideoGroup.php");

if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
} else {
    echo "Vui lòng chọn khóa học";
}

$course_obj = new Course($db);

$current_course = $course_obj->get_course_by_id($course_id);

$video_group_obj = new VideoGroup($db);

$all_video_groups_arr_by_course_id = $video_group_obj->get_video_groups_by_course_id($course_id);

?>

<!-- Header -->
<?php include("../../partials/header.php"); ?>

<!-- Sidebar -->
<?php include("../../partials/sidebar.php"); ?>
<!-- End of Sidebar -->

    <?php include("../../partials/topbar.php") ?>



        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Xem tất cả nhóm videos</h1>
        <p class="mb-4">Quản lý nhóm videos</a>.</p>
        <p class="mb-4">Bạn đang xem nhóm video của khóa học:
            <p><strong>Course ID: <?= $current_course['id'] ?></strong></p>
            <p><strong>Course Name: <?= $current_course['name'] ?></strong></p>
            <p><strong>Course Topic: <?= $current_course['topic'] ?></strong></p>
            <p><strong>Course Type: <?= $current_course['type'] ?></strong></p>

        </p>

        <!-- Courses Table Data -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Xem tất cả nhóm videos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <a class="btn btn-primary mb-4" href="video_groups_add.php?course_id=<?= $current_course['id'] ?>">Add New Video Group</a>

                        <thead>
                        <tr>
                            <th>Video Group ID</th>
                            <th>Course</th>
                            <th>Video Group name</th>
                            <th>Video Group order</th>
                            <!--                        <th>Course Description</th>-->
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        <?php

                        foreach ($all_video_groups_arr_by_course_id as $video_group):

                            ?>

                            <tr>
                                <td><?= $video_group['id'] ?></td>
                                <td><?= $course_obj->get_course_by_id($video_group['course_id'])['name']?></td>
                                <td><?= $video_group['name'] ?></td>
                                <td><?= $video_group['video_group_order'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="video_groups_edit.php?id=<?= $video_group['id'] ?>">Edit</a>
                                    <a class="btn btn-info" href="../videos/videos_view.php?video_group_id=<?= $video_group['id'] ?>">Xem videos</a>
                                    <a href="video_groups_delete.php?id=<?= $video_group['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

                                </td>
                            </tr>

                        <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>