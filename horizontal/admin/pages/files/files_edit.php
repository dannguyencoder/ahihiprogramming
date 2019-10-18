<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/Video.php");
include("../../includes/classes/File.php");

$file_obj = new File($db);

if (!isset($_GET['id'])) {
    header("Location: files_view.php");
}

$file_id = $_GET['id'];
$current_file = $file_obj->get_file_by_id($file_id);

if (!$current_file) {
    header("Location: files_view.php");
}


$video_obj = new Video($db);
$all_videos_arr = $video_obj->get_all_videos();

if (isset($_POST['submit_add_file'])) {
    $file_obj = new File($db);

    $file_obj->video_id = $_POST['video_id'];

    $file_obj->title = $_POST['file_title'];
    $file_obj->description = $_POST['file_description'];
    $file_obj->link = $_POST['file_link'];



    if (!$file_obj->update_file($file_id)) {
        die("Query failed");
    } else {
        echo "File updated successfully";
        $current_file = $file_obj->get_file_by_id($file_id);
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
    <h1 class="h3 mb-2 text-gray-800">Sửa file</h1>
    <p class="mb-4">Sửa file file hiện tại trên video của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa file</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="video_group_id">Video:</label>
                    <select class="form-control" id="video_id" name="video_id">

                        <?php foreach ($all_videos_arr as $video): ?>
                            <option value="<?= $video['id'] ?>p" <?php if ($current_file['video_id'] == $video['id']) echo "selected"; ?>><?= $video['title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="File_title">File Title:</label>
                    <input type="text" class="form-control" id="file_title" name="file_title" value="<?= $current_file['title'] ?>">
                </div>

                <div class="form-group">
                    <label for="file_description">File Description: </label>
                    <textarea class="form-control" name="file_description"><?= $current_file['description'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="file_link">File Link (PDF - recommended):</label>
                    <input type="text" class="form-control" id="file_link" name="file_link" value="<?= $current_file['link'] ?>">
                </div>

                <button type="submit" name="submit_add_file" class="btn btn-warning">Update</button>
                <a href="files_delete.php?id=<?= $current_file['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>