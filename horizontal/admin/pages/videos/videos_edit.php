<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/VideoGroup.php");
include("../../includes/classes/Video.php");

$video_obj = new Video($db);

if (!isset($_GET['id'])) {
    header("Location: videos_view.php");
}

$video_id = $_GET['id'];
$current_video = $video_obj->get_video_by_id($video_id);

if (!$current_video) {
    header("Location: videos_view.php");
}


$video_group_obj = new VideoGroup($db);
$all_video_groups_arr = $video_group_obj->get_all_video_groups();

if (isset($_POST['submit_edit_video'])) {
    $video_obj = new Video($db);

    $video_obj->title = $_POST['video_title'];
    $video_obj->description = $_POST['video_description'];

    if(!file_exists($_FILES['video_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['video_thumbnail']['tmp_name'])) {
        $video_obj->thumbnail = $current_video['thumbnail'];
    } else {
        /*File upload*/
        $base_dir = "/uploads/images/videos/";
        $target_dir = "../../../" . $base_dir;
        $file_name = basename($_FILES["video_thumbnail"]["name"]);
        $target_file = $target_dir . $file_name;

        move_uploaded_file($_FILES["video_thumbnail"]["tmp_name"], $target_file);

        $video_obj->thumbnail = $base_dir. $file_name;
    }



    $video_obj->link = $_POST['video_link'];
    $video_obj->duration = $_POST['video_duration'];
    $video_obj->video_order = $_POST['video_order'];


    $video_obj->video_group_id = $_POST['video_group_id'];



    if (!$video_obj->update_video($video_id)) {
        die("Query failed");
    } else {
        echo "Video updated successfully";
        $current_video = $video_obj->get_video_by_id($video_id);
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
    <h1 class="h3 mb-2 text-gray-800">Sửa video</h1>
    <p class="mb-4">Sửa video cho nhóm video hiện tại của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa video</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="video_group_id">Video Group:</label>
                    <select class="form-control" id="video_group_id" name="video_group_id">

                        <?php foreach ($all_video_groups_arr as $video_group): ?>
                            <option
                                    value="<?= $video_group['id'] ?>p"
                                    <?php if ($current_video['video_group_id'] == $video_group['id']) echo "selected"; ?>
                            ><?= $video_group['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="video_title">Video Title:</label>
                    <input type="text" class="form-control" id="video_title" name="video_title" value="<?= $current_video['title'] ?>">
                </div>

                <div class="form-group">
                    <label for="video_thumbnail">Video thumbnail:</label>
                    <p>
                        <img style="max-height: 100px;" src="<?= $current_video['thumbnail'] ?>" alt="<?= $current_video['description'] ?>">
                    </p>
                    <input type="file" id="video_thumbnail" name="video_thumbnail">
                </div>

                <div class="form-group">
                    <label for="video_description">Video Description: </label>
                    <textarea name="video_description"><?= $current_video['description'] ?></textarea>
                    <script>
                        CKEDITOR.replace('video_description');
                    </script>
                </div>

                <div class="form-group">
                    <label for="video_link">Video Link (Embbed - Youtube):</label>
                    <input type="text" class="form-control" id="video_link" name="video_link" value="<?= $current_video['link'] ?>">
                </div>

                <div class="form-group">
                    <label for="video_duration">Duration (in seconds)</label>
                    <input required type="number" class="form-control" id="video_duration" name="video_duration" value="<?= $current_video['duration'] ?>">
                </div>

                <div class="form-group">
                    <label for="video_order">Order:</label>
                    <input required type="number" class="form-control" id="video_order" name="video_order" value="<?= $current_video['video_order'] ?>">
                </div>


                <button type="submit" name="submit_edit_video" class="btn btn-warning">Update</button>
                <a class="btn btn-info" href="../files/files_view.php?video_id=<?= $current_video['id'] ?>">Xem files</a>
                <a href="videos_delete.php?id=<?= $current_video['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>