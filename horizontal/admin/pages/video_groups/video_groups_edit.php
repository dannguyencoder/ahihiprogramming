<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/Course.php");
include("../../includes/classes/VideoGroup.php");

$courseObj = new Course($db);

$coursesArr = $courseObj->get_all_courses();

$video_group_obj = new VideoGroup($db);

if (!isset($_GET['id'])) {

    header("Location: video_groups_view.php");
}

$video_group_id = $_GET['id'];
$current_video_group = $video_group_obj->get_video_group_by_id($video_group_id);

if (!$current_video_group) {
    header("Location: video_groups_view.php");
}

if (isset($_POST['submit_edit_video_group'])) {
    $video_group = new VideoGroup($db);

    $video_group->course_id = $_POST['course_id'];
    $video_group->name = $_POST['video_group_name'];
    $video_group->video_group_order = $_POST['video_group_order'];

    if (!$video_group->update_video_group($video_group_id)) {
        die("Query failed");
    } else {
        echo "Video Group updated successfully";
        $current_video_group = (array) $video_group;
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
    <h1 class="h3 mb-2 text-gray-800">Sủa nhóm videos</h1>
    <p class="mb-4">Sửa nhóm videos hiện tại cho khóa học của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa nhóm video</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="course_id">Courses</label>
                    <select class="form-control" id="course_id" name="course_id">

                        <?php foreach ($coursesArr as $course): ?>
                            <option value="<?= $course['id'] ?>" <?php if ($current_video_group['course_id'] == $course['id']) echo "selected" ?>>
                                <?= $course['id'] . " - " . $course['name']  . " - " . $course['type']. " - " . $course['topic'] ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>


                <div class="form-group">
                    <label for="video_group_name">Video Group name:</label>
                    <input type="text" class="form-control" id="video_group_name" name="video_group_name" value="<?= $current_video_group['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="video_group_order">Video Group Order:</label>
                    <input required type="number" class="form-control" id="video_group_order" name="video_group_order" value="<?= $current_video_group['video_group_order'] ?>">
                </div>


                <button type="submit" name="submit_edit_video_group" class="btn btn-primary">Update</button>
                <a class="btn btn-info" href="../videos/videos_view.php?video_group_id=<?= $current_video_group['id'] ?>">Xem videos</a>
                <a href="video_groups_delete.php?id=<?= $current_video_group['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>