<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/User.php");
include("../../includes/classes/Course.php");

if (isset($_POST['submit_add_course'])) {
    $course = new Course($db);

    $course->topic = $_POST['course_topic'];
    $course->type = $_POST['course_type'];

    $course->name = $_POST['course_name'];
    $course->slug = $_POST['course_slug'];
    $course->old_price = $_POST['course_old_price'];
    $course->price = $_POST['course_price'];


    /*File upload*/
    $base_dir = "/uploads/images/courses/";
    $target_dir = "../../../" . $base_dir;
    $file_name = basename($_FILES["course_thumbnail"]["name"]);
    $target_file = $target_dir . $file_name;

    move_uploaded_file($_FILES["course_thumbnail"]["tmp_name"], $target_file);

//    $course_thumbnail_tmp_name = $_FILES['course_thumbnail']["tmp_name"];
//    $course_thumbnail_real_name = $_FILES['course_thumbnail']['name'];
//    $course_thumbnail_relative_path = "uploads";
//
//    $upload_file = move_uploaded_file($course_thumbnail_tmp_name, "$course_thumbnail_relative_path/{$course_thumbnail_real_name}");
//
//    if ($upload_file) {
//        echo "Upload file successfully";
//    } else {
//        die("upload failed");
//    }

    $course->thumbnail = $base_dir . $file_name;


    $course->short_description = $_POST['course_short_desc'];
    $course->long_description = $_POST['course_long_desc'];

    $course->remaining_slots = $_POST['remaining_slots'];
    $course->inner_description = $_POST['inner_description'];
    $course->course_order = $_POST['course_order'];
    $course->user_id = $_POST['user_id'];

    $course->is_active = isset($_POST['is_active']) ? 1 : 0;
//    $user_id = $_POST['user_id'];

    if (!$course->add_course()) {
        die("Query failed");
    } else {
        echo "Courses added successfully";
    }


}

$user_obj = new User($db);

$all_users_arr = $user_obj->get_all_users();
?>

    <!-- Header -->
<?php include("../../partials/header.php"); ?>

    <!-- Sidebar -->
<?php include("../../partials/sidebar.php"); ?>
    <!-- End of Sidebar -->

<?php include("../../partials/topbar.php") ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm mới khóa học</h1>
    <p class="mb-4">Thêm mới khóa học cho website của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới khóa học</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="course_topic">Course Topic:</label>
                    <select class="form-control" id="course_topic" name="course_topic">
                        <option value="lap-trinh-web">Lập trình Web</option>
                        <option value="lap-trinh-mobile">Lập trình Mobile</option>
                        <option value="nen-tang-lap-trinh">Nền tảng</option>
                        <option value="lop-offline">Lớp Offline</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_type">Course Type:</label>
                    <select class="form-control" id="course_type" name="course_type">
                        <option value="tong-quat">Tổng quát</option>
                        <option value="chuyen-de">Chuyên đề</option>
                        <option value="offline-1">Offline 1</option>
                        <option value="offline-2">Offline 2</option>
                        <option value="offline-3">Offline 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_name">Course name:</label>
                    <input type="text" class="form-control" id="course_name" name="course_name">
                </div>

                <div class="form-group">
                    <label for="course_slug">Course Slug:</label>
                    <input type="text" class="form-control" id="course_slug" name="course_slug">
                </div>

                <div class="form-group">
                    <label for="course_price">Course Old price:</label>
                    <span>$</span>
                    <input required type="number" class="form-control" id="course_old_price" name="course_old_price">
                </div>

                <div class="form-group">
                    <label for="course_price">Course price:</label>
                    <span>$</span>
                    <input required type="number" class="form-control" id="course_price" name="course_price">
                </div>

                <div class="form-group">
                    <label for="course_thumbnail">Course thumbnail:</label>
                    <input required type="file" id="course_thumbnail" name="course_thumbnail">
                </div>

                <div class="form-group">
                    <label for="course_short_desc">Course short description: </label>
                    <textarea name="course_short_desc"></textarea>
                    <script>
                        CKEDITOR.replace('course_short_desc');
                    </script>
                </div>

                <div class="form-group">
                    <label for="course_long_desc">Course long description: </label>
                    <textarea name="course_long_desc" rows="10"></textarea>
                    <script>
                        CKEDITOR.replace('course_long_desc', {
                            height: 800
                        });
                    </script>
                </div>

                <div class="form-group">
                    <label for="course_price">Remaining slots:</label>
                    <span>$</span>
                    <input required type="number" class="form-control" id="remaining_slots" name="remaining_slots">
                </div>

                <div class="form-group">
                    <label for="inner_description">Inner description:</label>
                    <input required type="text" class="form-control" id="inner_description" name="inner_description">
                </div>

                <div class="form-group">
                    <label for="course_order">Course Order:</label>
                    <input required type="number" class="form-control" id="course_order" name="course_order">
                </div>

                <div class="checkbox">
                    <label><input name="is_active" type="checkbox" checked>Is Active</label>
                </div>

                <div class="form-group">
                    <label for="user_id">Course User ID:</label>
                    <select class="form-control" id="user_id" name="user_id">

                        <?php foreach ($all_users_arr as $user): ?>
                            <option value="<?= $user['id'] ?>"><?= $user['full_name']  ?></option>
                        <?php endforeach; ?>


                    </select>
                </div>


                <button type="submit" name="submit_add_course" class="btn btn-primary">Add</button>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>