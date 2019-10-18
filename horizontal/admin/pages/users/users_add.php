<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/User.php");

if (isset($_POST['submit_add_user'])) {
    $user_obj = new User($db);

    $user_obj->username = $_POST['username'];
    $user_obj->password = md5($_POST['password']);

    $user_obj->email = $_POST['email'];
    $user_obj->phone_number = $_POST['phone_number'];
    $user_obj->full_name = $_POST['full_name'];
    $user_obj->title = $_POST['title'];

    /*File upload*/
    $base_dir = "/uploads/images/avatars/";
    $target_dir = "../../../" . $base_dir;
    $file_name = basename($_FILES["avatar"]["name"]);
    $target_file = $target_dir . $file_name;

    move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

    $user_obj->avatar = $base_dir. $file_name;


    $user_obj->description = htmlspecialchars($_POST['description']);



    if (!$user_obj->add_user()) {
        die("Query failed");
    } else {
        echo "User added successfully";
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
    <h1 class="h3 mb-2 text-gray-800">Thêm mới người dùng</h1>
    <p class="mb-4">Thêm mới người dùng cho website của bạn</a>.</p>

    <!-- Add Course Form -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm mới người dùng</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number:</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number">
                </div>

                <div class="form-group">
                    <label for="full_name">Fullname:</label>
                    <input type="text" class="form-control" id="full_name" name="full_name">
                </div>

                <div class="form-group">
                    <label for="full_name">Title:</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>


                <div class="form-group">
                    <label for="avatar">Avatar:</label>
                    <img style="max-height: 100px;" src="" alt="">
                    <input required type="file" id="avatar" name="avatar">
                </div>

                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea name="description" id="description" rows="10"></textarea>
                    <script>
                        CKEDITOR.replace('description', {
                            height: 400
                        });
                    </script>
                </div>



                <button type="submit" name="submit_add_user" class="btn btn-primary">Add</button>

            </form>

        </div>
    </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>