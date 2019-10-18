<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../../includes/helpers.php");
include("../../includes/classes/User.php");

$user_obj = new User($db);

$all_users = $user_obj->get_all_users();

?>

<!-- Header -->
<?php include("../../partials/header.php"); ?>

<!-- Sidebar -->
<?php include("../../partials/sidebar.php"); ?>
<!-- End of Sidebar -->

    <?php include("../../partials/topbar.php") ?>



        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Xem tất cả người dùng</h1>
        <p class="mb-4">Quản lý khóa học</a>.</p>

        <!-- Courses Table Data -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Xem tất cả các người dùng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        <?php

                        foreach ($all_users as $user):

                            ?>

                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['full_name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['phone_number'] ?></td>
                                <td><img style="max-height: 100px;" src="<?= $user['avatar'] ?>" alt=""></td>

                                <td>
                                    <a class="btn btn-warning" href="users_edit.php?id=<?= $user['id'] ?>">Edit</a>
                                    <a href="users_delete.php?id=<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

                                </td>
                            </tr>

                        <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    <!-- Footer -->
<?php include("../../partials/footer.php") ?>