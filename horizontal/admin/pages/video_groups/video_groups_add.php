<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/Course.php");
include("../../includes/classes/VideoGroup.php");

if (isset($_GET['course_id'])) {
    $current_course_id = $_GET['course_id'];
}

$courseObj = new Course($db);

$coursesArr = $courseObj->get_all_courses();

if (isset($_POST['submit_add_video_group'])) {
    $video_group = new VideoGroup($db);

    $video_group->course_id = $_POST['course_id'];
    $video_group->name = $_POST['video_group_name'];
    $video_group->video_group_order = $_POST['video_group_order'];

    if (!$video_group->add_video_group()) {
        die("Query failed");
    } else {
        echo "Video Group added successfully";
    }


}
?>

    <!-- Header -->
<?php include("../../partials/header.php"); ?>

    <!-- Sidebar -->
<?php include("../../partials/sidebar.php"); ?>
    <!-- End of Sidebar -->

<?php include("../../partials/topbar.php") ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm nhóm videos mới</h1>
    <p class="mb-4">Thêm nhóm videos mới vào cho khóa học của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm nhóm video</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="course_id">Courses</label>
                    <select class="form-control" id="course_id" name="course_id">

                        <?php foreach ($coursesArr as $course): ?>
                            <option <?= $course['id'] == $current_course_id ? "selected" : "" ?> value="<?= $course['id'] ?>"><?= $course['id'] . " - " . $course['name']  . " - " . $course['type']. " - " . $course['topic'] ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>


                <div class="form-group">
                    <label for="video_group_name">Video Group name:</label>
                    <input type="text" class="form-control" id="video_group_name" name="video_group_name">
                </div>

                <div class="form-group">
                    <label for="video_group_order">Video Group Order:</label>
                    <input required type="number" class="form-control" id="video_group_order" name="video_group_order">
                </div>


                <button type="submit" name="submit_add_video_group" class="btn btn-primary">Add</button>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>