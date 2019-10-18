<?php
include("../../includes/check_login.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/Course.php");

$course_id = $_GET['id'];

if (!isset($_GET['id'])) {
    header("Location: courses_view.php");
}

$course = new Course($db);
$course->delete_course($course_id);

header("Location: courses_view.php")

?>