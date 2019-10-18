<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/User.php");

$user_obj = new User($db);

if (!isset($_GET['id'])) {
    header("Location: users_view.php");
}

$user_id = $_GET['id'];
$current_user = $user_obj->get_user_by_id($user_id);

if (!$current_user) {
    header("Location: users_view.php");
}

if (isset($_POST['submit_edit_user'])) {
    $user_obj = new User($db);

    $user_obj->username = $_POST['username'];
    $user_obj->password = md5($_POST['password']);

    $user_obj->email = $_POST['email'];
    $user_obj->phone_number = $_POST['phone_number'];
    $user_obj->full_name = $_POST['full_name'];
    $user_obj->title = $_POST['title'];

    if(!file_exists($_FILES['avatar']['tmp_name']) || !is_uploaded_file($_FILES['avatar']['tmp_name'])) {
        $user_obj->avatar = $current_user['avatar'];
    } else {

        /*File upload*/
        $base_dir = "/uploads/images/avatars/";
        $target_dir = "../../../" . $base_dir;
        $file_name = basename($_FILES["avatar"]["name"]);
        $target_file = $target_dir . $file_name;

        move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

        $user_obj->avatar = $base_dir. $file_name;

    }




    $user_obj->description = htmlspecialchars($_POST['description']);



    if (!$user_obj->update_user($user_id)) {
        die("Query failed");
    } else {
        echo "User added successfully";
        $current_user = $user_obj->get_user_by_id($user_id);
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
    <h1 class="h3 mb-2 text-gray-800">Sửa thông tin người dùng</h1>
    <p class="mb-4">Sửa thông tin người dùng / giáo viên trên website của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa thông tin người dùng</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $current_user['username'] ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= $current_user['password'] ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $current_user['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $current_user['phone_number'] ?>">
                </div>

                <div class="form-group">
                    <label for="full_name">Fullname:</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $current_user['full_name'] ?>">
                </div>

                <div class="form-group">
                    <label for="full_name">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $current_user['title'] ?>">
                </div>


                <div class="form-group">
                    <label for="avatar">Avatar:</label>
                    <p>
                        <img style="max-height: 100px;" src="<?= $current_user['avatar'] ?>" alt="">
                    </p>
                    <input type="file" id="avatar" name="avatar">
                </div>

                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea name="description" id="description" rows="10"><?= $current_user['description'] ?></textarea>
                    <script>
                        CKEDITOR.replace('description', {
                            height: 400
                        });
                    </script>
                </div>



                <button type="submit" name="submit_edit_user" class="btn btn-warning">Update</button>
                <a href="users_delete.php?id=<?= $current_user['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>