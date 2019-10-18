<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/VideoGroup.php");
include("../../includes/classes/Video.php");

if (isset($_GET['video_group_id'])) {
    $current_video_group_id = $_GET['video_group_id'];
}

$video_group_obj = new VideoGroup($db);
$all_video_groups_arr = $video_group_obj->get_all_video_groups();

if (isset($_POST['submit_add_video'])) {
    $video = new Video($db);

    $video->title = $_POST['video_title'];
    $video->description = $_POST['video_description'];


    /*File upload*/
    $base_dir = "/uploads/images/videos/";
    $target_dir = "../../../" . $base_dir;
    $file_name = basename($_FILES["video_thumbnail"]["name"]);
    $target_file = $target_dir . $file_name;

    move_uploaded_file($_FILES["video_thumbnail"]["tmp_name"], $target_file);

    $video->thumbnail = $base_dir. $file_name;

    $video->link = $_POST['video_link'];
    $video->duration = $_POST['video_duration'];
    $video->order = $_POST['video_order'];


    $video->video_group_id = $_POST['video_group_id'];



    if (!$video->add_video()) {
        die("Query failed");
    } else {
        echo "Video added successfully";
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
    <h1 class="h3 mb-2 text-gray-800">Thêm mới video</h1>
    <p class="mb-4">Thêm mới video cho nhóm video của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới video</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="video_group_id">Video Group:</label>
                    <select class="form-control" id="video_group_id" name="video_group_id">

                        <?php foreach ($all_video_groups_arr as $video_group): ?>
                            <option <?= $video_group['id'] == $current_video_group_id ? "selected" : "" ?> value="<?= $video_group['id'] ?>"><?= $video_group['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="video_title">Video Title:</label>
                    <input type="text" class="form-control" id="video_title" name="video_title">
                </div>

                <div class="form-group">
                    <label for="video_thumbnail">Video thumbnail:</label>
                    <img src="" alt="">
                    <input required type="file" id="video_thumbnail" name="video_thumbnail">
                </div>

                <div class="form-group">
                    <label for="video_description">Video Description: </label>
                    <textarea name="video_description"></textarea>
                    <script>
                        CKEDITOR.replace('video_description');
                    </script>
                </div>

                <div class="form-group">
                    <label for="video_link">Video Link (Embbed - Youtube):</label>
                    <input type="text" class="form-control" id="video_link" name="video_link">
                </div>

                <div class="form-group">
                    <label for="video_duration">Duration (in seconds)</label>
                    <input required type="number" class="form-control" id="video_duration" name="video_duration">
                </div>

                <div class="form-group">
                    <label for="video_order">Order:</label>
                    <input required type="number" class="form-control" id="video_order" name="video_order">
                </div>


                <button type="submit" name="submit_add_video" class="btn btn-primary">Add</button>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>