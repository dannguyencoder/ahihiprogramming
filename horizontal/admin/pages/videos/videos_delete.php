<?php
include("../../includes/check_login.php");
include("../../../includes/connect_db.php");
include("../../includes/classes/Video.php");

$video_id = $_GET['id'];

if (!isset($_GET['id'])) {
    header("Location: videos_view.php");
}

$video_obj = new Video($db);
$video_obj->delete_video($video_id);

header("Location: videos_view.php")

?>