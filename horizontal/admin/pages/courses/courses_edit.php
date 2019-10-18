<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/User.php");
include("../../includes/classes/Course.php");

$course = new Course($db);

if (!isset($_GET['id'])) {
    header("Location: courses_view.php");
}

$course_id = $_GET['id'];
$current_course = $course->get_course_by_id($course_id);

if (!$current_course) {
    header("Location: courses_view.php");
}

if (isset($_POST['submit_edit_course'])) {

    $course->topic = $_POST['course_topic'];
    $course->type = $_POST['course_type'];

    $course->name = $_POST['course_name'];
    $course->slug = $_POST['course_slug'];
    $course->old_price = $_POST['course_old_price'];
    $course->price = $_POST['course_price'];

    if(!file_exists($_FILES['course_thumbnail']['tmp_name']) || !is_uploaded_file($_FILES['course_thumbnail']['tmp_name'])) {
        $course->thumbnail = $current_course['thumbnail'];
    } else {
        /*File upload*/
        $base_dir = "/uploads/images/courses/";
        $target_dir = "../../../" . $base_dir;
        $file_name = basename($_FILES["course_thumbnail"]["name"]);
        $target_file = $target_dir . $file_name;

        move_uploaded_file($_FILES["course_thumbnail"]["tmp_name"], $target_file);

        $course->thumbnail = $base_dir. $file_name;
    }




    $course->short_description = htmlspecialchars($_POST['course_short_desc']);
    $course->long_description = htmlspecialchars($_POST['course_long_desc']);

    $course->remaining_slots = $_POST['remaining_slots'];
    $course->inner_description = $_POST['inner_description'];
    $course->course_order = $_POST['course_order'];
    $course->user_id = $_POST['user_id'];

    $course->is_active = isset($_POST['is_active']) ? 1 : 0;
//    $user_id = $_POST['user_id'];

    if (!$course->update_course($current_course['id'])) {
        die("Query failed");
    } else {
        echo "Courses Updated successfully";
        $current_course = (array) $course;
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
    <h1 class="h3 mb-2 text-gray-800">Sửa khóa học</h1>
    <p class="mb-4">Sửa khóa học hiện tại trên website của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa khóa học</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="course_topic">Course Topic:</label>
                    <select class="form-control" id="course_topic" name="course_topic">
                        <option value="lap-trinh-web" <?php if ($current_course['topic'] == 'lap-trinh-web') echo "selected";  ?>>Lập trình Web</option>
                        <option value="lap-trinh-mobile" <?php if ($current_course['topic'] == 'tu-vung') echo "selected";  ?>>Lập trình Mobile</option>
                        <option value="nen-tang-lap-trinh" <?php if ($current_course['topic'] == 'giao-tiep') echo "selected";  ?>>Nền tảng</option>
                        <option value="lop-offline" <?php if ($current_course['topic'] == 'lop-offline') echo "selected";  ?>>Lớp Offline</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_type">Course Type:</label>
                    <select class="form-control" id="course_type" name="course_type">
                        <option value="tong-quat" <?php if ($current_course['type'] == 'tong-quat') echo "selected";  ?>>Tổng quát</option>
                        <option value="chuyen-de" <?php if ($current_course['type'] == 'chuyen-de') echo "selected";  ?>>Chuyên đề</option>
                        <option value="offline-1" <?php if ($current_course['type'] == 'offline-1') echo "selected";  ?>>Offline 1</option>
                        <option value="offline-2" <?php if ($current_course['type'] == 'offline-2') echo "selected";  ?>>Offline 2</option>
                        <option value="offline-3" <?php if ($current_course['type'] == 'offline-3') echo "selected";  ?>>Offline 3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="course_name">Course name:</label>
                    <input type="text" class="form-control" id="course_name" name="course_name" value="<?= $current_course['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="course_slug">Course slug:</label>
                    <input type="text" class="form-control" id="course_slug" name="course_slug" value="<?= $current_course['slug'] ?>">
                </div>

                <div class="form-group">
                    <label for="course_price">Course Old price:</label>
                    <span>$</span>
                    <input required type="number" class="form-control" id="course_old_price" name="course_old_price" value="<?= $current_course['old_price'] ?>">
                </div>

                <div class="form-group">
                    <label for="course_price">Course price:</label>
                    <span>$</span>
                    <input required type="number" class="form-control" id="course_price" name="course_price" value="<?= $current_course['price'] ?>">
                </div>

                <div class="form-group">
                    <label for="course_thumbnail">Course thumbnail:</label>
                    <p>
                        <img src="<?= $current_course['thumbnail']  ?>" style="max-height: 100px;" alt="">
                    </p>
                    <input type="file" id="course_thumbnail" name="course_thumbnail">
                </div>

                <div class="form-group">
                    <label for="course_short_desc">Course short description: </label>
                    <textarea name="course_short_desc"><?= $current_course['short_description'] ?></textarea>
                    <script>
                        CKEDITOR.replace('course_short_desc');
                    </script>
                </div>

                <div class="form-group">
                    <label for="course_long_desc">Course long description: </label>
                    <textarea name="course_long_desc" rows="10"><?= $current_course['long_description'] ?></textarea>
                    <script>
                        CKEDITOR.replace('course_long_desc', {
                            height: 800
                        });
                    </script>
                </div>

                <div class="form-group">
                    <label for="remaining_slots">Remaining slots:</label>
                    <span>$</span>
                    <input required type="number" class="form-control" id="remaining_slots" name="remaining_slots" value="<?= $current_course['remaining_slots'] ?>">
                </div>

                <div class="form-group">
                    <label for="inner_description">Inner description:</label>
                    <input required type="text" class="form-control" id="inner_description" name="inner_description" value="<?= $current_course['inner_description'] ?>">
                </div>

                <div class="form-group">
                    <label for="course_order">Course Order:</label>
                    <input required type="number" class="form-control" id="course_order" name="course_order" value="<?= $current_course['course_order'] ?>">
                </div>

                <div class="checkbox">
                    <label><input name="is_active" type="checkbox" <?php if ($current_course['is_active']) echo "checked"; ?>>Is Active</label>
                </div>

                <div class="form-group">
                    <label for="user_id">Course User ID:</label>
                    <select class="form-control" id="user_id" name="user_id">

                        <?php foreach ($all_users_arr as $user): ?>
                            <option value="<?= $user['id'] ?>" <?php if ($current_course['user_id'] == $user['id']) echo "selected";  ?>><?= $user['full_name']  ?></option>
                        <?php endforeach; ?>

                    </select>
                </div>


                <button type="submit" name="submit_edit_course" class="btn btn-warning">Update</button>
                <a class="btn btn-info" href="../video_groups/video_groups_view.php?course_id=<?= $current_course['id'] ?>">Xem nhóm videos</a>
                <a href="courses_delete.php?id=<?= $current_course['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>