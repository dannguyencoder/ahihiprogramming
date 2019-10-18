<?php
include("../../includes/check_login.php");
include("../../includes/constants.php");
include("../../../includes/connect_db.php");
include("../../../includes/helpers.php");
include("../../includes/classes/Course.php");

$course = new Course($db);

$all_courses = $course->get_all_courses();

?>

<!-- Header -->
<?php include("../../partials/header.php"); ?>

<!-- Sidebar -->
<?php include("../../partials/sidebar.php"); ?>
<!-- End of Sidebar -->

    <?php include("../../partials/topbar.php") ?>



        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Xem tất cả khóa học</h1>
        <p class="mb-4">Quản lý khóa học</a>.</p>

        <!-- Courses Table Data -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Xem tất cả các khóa học</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">


                        <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Course name</th>
                            <th>Course slug</th>
                            <th>Course price</th>
                            <th>Course avatar link</th>
                            <th>Course short description</th>
                            <th>Is Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        <?php

                        foreach ($all_courses as $course):

                            ?>

                            <tr>
                                <td><?= $course['id'] ?></td>
                                <td><?= $course['name'] ?></td>
                                <td><?= $course['slug'] ?></td>
                                <td><?= $course['price'] ?></td>
                                <td><img style="max-height: 100px;" src="<?= $course['thumbnail'] ?>" alt=""></td>
                                <td><?= substrwords($course['short_description'], 150) ?></td>
                                <!--                        <td>--><?php //echo $course['course_long_desc'] ?><!--</td>-->
                                <td><?= $course['is_active'] ? "Active" : "Hidden" ?></td>
                                <td>
                                    <a class="btn btn-warning" href="courses_edit.php?id=<?= $course['id'] ?>">Edit</a>
                                    <a class="btn btn-info" href="../video_groups/video_groups_view.php?course_id=<?= $course['id'] ?>">Xem nhóm videos</a>
                                    <a href="courses_delete.php?id=<?= $course['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không ?');">Delete</a>

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