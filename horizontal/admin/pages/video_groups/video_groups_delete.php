<?php
include("../../includes/check_login.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/VideoGroup.php");

$video_group_id = $_GET['id'];

if (!isset($_GET['id'])) {
    header("Location: courses_view.php");
}

$video_group = new VideoGroup($db);
$video_group->delete_video_group($video_group_id);

header("Location: video_groups_view.php")

?>