<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../../includes/helpers.php");
include("../../includes/classes/Course.php");
include("../../includes/classes/VideoGroup.php");
include("../../includes/classes/Video.php");
include("../../includes/classes/File.php");

if (isset($_GET['video_id'])) {
    $video_id = $_GET['video_id'];
} else {
    echo "Vui lòng chọn video";
}

$video_obj = new Video($db);

$current_video = $video_obj->get_video_by_id($video_id);

$video_group_obj = new VideoGroup($db);

$current_video_group = $video_group_obj->get_video_group_by_id($current_video['video_group_id']);

$course_obj = new Course($db);

$current_course = $course_obj->get_course_by_id($current_video_group['course_id']);

$file_obj = new File($db);

$all_files__by_video_id_arr = $file_obj->get_files_by_video_id($video_id);

?>

    <!-- Header -->
<?php include("../../partials/header.php"); ?>

    <!-- Sidebar -->
<?php include("../../partials/sidebar.php"); ?>
    <!-- End of Sidebar -->

<?php include("../../partials/topbar.php") ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Xem danh sách files</h1>
    <p class="mb-4">Quản lý File</a>.</p>
    <p class="mb-4">Bạn các files của video:</p>
    <p><strong>Video ID: <?= $current_video['id'] ?></strong></p>
    <p><strong>Video Name: <?= $current_video['title'] ?></strong></p>
    <p><strong>Video Group: <?= $current_video_group['name'] ?></strong></p>
    <p><strong>Khóa học: <?= $current_course['name'] ?></strong></p>

    <!-- Courses Table Data -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Xem tất cả các file</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <a class="btn btn-primary mb-4" href="files_add.php?video_id=<?= $current_video['id'] ?>">Add New File</a>

                    <thead>
                    <tr>
                        <th>File ID</th>
                        <th>File Title</th>
                        <th>File Description</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                    </thead>


                    <tbody>

                    <?php

                    foreach ($all_files__by_video_id_arr as $file):

                        ?>

                        <tr>
                            <td><?= $file['id'] ?></td>
                            <td><?= $file['title'] ?></td>
                            <td><?= $file['description'] ?></td>
                            <td><?= $file['link'] ?></td>
                            <td>
                                <a class="btn btn-warning" href="files_edit.php?id=<?= $file['id'] ?>">Edit</a>
                                <a href="files_delete.php?id=<?= $file['id'] ?>" class="btn btn-danger"
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