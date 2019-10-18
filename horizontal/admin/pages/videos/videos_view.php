<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../../includes/helpers.php");
include("../../includes/classes/Course.php");
include("../../includes/classes/VideoGroup.php");
include("../../includes/classes/Video.php");

if (isset($_GET['video_group_id'])) {
    $video_group_id = $_GET['video_group_id'];
} else {
    echo "Vui lòng chọn nhóm video";
}

$video_group_obj = new VideoGroup($db);

$current_video_group = $video_group_obj->get_video_group_by_id($video_group_id);

$video_obj = new Video($db);

$all_videos_by_video_group_id_arr = $video_obj->get_videos_by_video_group_id($video_group_id);

$course = new Course($db);
$current_course = $course->get_course_by_id($current_video_group['course_id']);

?>

    <!-- Header -->
<?php include("../../partials/header.php"); ?>

    <!-- Sidebar -->
<?php include("../../partials/sidebar.php"); ?>
    <!-- End of Sidebar -->

<?php include("../../partials/topbar.php") ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Xem tất cả videos</h1>
    <p class="mb-4">Quản lý videos</a>.</p>
    <p class="mb-4">Bạn đang videos của nhóm video:
    <p><strong>Video Group ID: <?= $current_video_group['id'] ?></strong></p>
    <p><strong>Video Group Name: <?= $current_video_group['name'] ?></strong></p>
    <p><strong>Video Group Order: <?= $current_video_group['video_group_order'] ?></strong></p>
    <p><strong>Khóa học: <?= $current_course['name'] ?></strong></p>

    </p>

    <!-- Courses Table Data -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Xem tất cả videos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <a class="btn btn-primary mb-4" href="videos_add.php?video_group_id=<?= $current_video_group['id'] ?>">Add New Video</a>

                    <thead>
                    <tr>
                        <th>Video ID</th>
                        <th>Video Group</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Description</th>
                        <th>Duration</th>
                        <th>Order</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>

                    <?php

                    foreach ($all_videos_by_video_group_id_arr as $video):

                        ?>

                        <tr>
                            <td><?= $video['id'] ?></td>
                            <td><?= $video_group_obj->get_video_group_by_id($video['video_group_id'])['name'] ?></td>
                            <td><?= $video['title'] ?></td>
                            <td><img style="max-height: 100px;" src="<?= $video['thumbnail'] ?>" alt=""></td>
                            <td><?= $video['description'] ?></td>
                            <td><?= formatVideoTime($video['duration']) ?></td>
                            <td><?= $video['video_order'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="videos_edit.php?id=<?= $video['id'] ?>">Edit</a>
                                <a class="btn btn-info" href="../files/files_view.php?video_id=<?= $video['id'] ?>">Xem files</a>
                                <a href="videos_delete.php?id=<?= $video['id'] ?>" class="btn btn-danger"
                                   onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

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