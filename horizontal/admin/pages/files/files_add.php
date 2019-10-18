<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/Video.php");
include("../../includes/classes/File.php");

if (isset($_GET['video_id'])) {
    $current_video_id = $_GET['video_id'];
}

$video_obj = new Video($db);
$all_videos_arr = $video_obj->get_all_videos();

if (isset($_POST['submit_add_file'])) {
    $file_obj = new File($db);

    $file_obj->video_id = $_POST['video_id'];

    $file_obj->title = $_POST['file_title'];
    $file_obj->description = $_POST['file_description'];
    $file_obj->link = $_POST['file_link'];



    if (!$file_obj->add_file()) {
        die("Query failed");
    } else {
        echo "File added successfully";
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
    <h1 class="h3 mb-2 text-gray-800">Thêm file mới</h1>
    <p class="mb-4">Thêm file mới vào cho video của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm file mới</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="video_group_id">Video:</label>
                    <select class="form-control" id="video_id" name="video_id">

                        <?php foreach ($all_videos_arr as $video): ?>
                            <option <?= $video['id'] == $current_video_id ? "selected" : "" ?> value="<?= $video['id'] ?>"><?= $video['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="File_title">File Title:</label>
                    <input type="text" class="form-control" id="file_title" name="file_title">
                </div>

                <div class="form-group">
                    <label for="file_description">File Description: </label>
                    <textarea class="form-control" name="file_description"></textarea>
                </div>

                <div class="form-group">
                    <label for="file_link">File Link (PDF - recommended):</label>
                    <input type="text" class="form-control" id="file_link" name="file_link">
                </div>

                <button type="submit" name="submit_add_file" class="btn btn-primary">Add</button>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>