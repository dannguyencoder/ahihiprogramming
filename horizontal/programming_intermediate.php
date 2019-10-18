<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<?php

require_once('includes/connect_db.php');
include('includes/constants.php');
include('includes/helpers.php');

include('includes/courses.php');
include('includes/video_groups.php');
include('includes/videos.php');

$course = getSingleCourseByTopicAndType('lop-offline', 'offline-2');

$video_groups = getVideoGroups($course['id']);

foreach ($video_groups as &$group) {
    $group['videos'] = getVideosByGroup($group['id']);
}


/*Page Title and Meta Tags for SEO*/
$page_title = "Lớp học Lập trình Web - Ahihi Programming";
$meta_description = "Học trọn vẹn từ căn bản tới nâng cao để chiến đấu với Lập trình Web.";

?>

<?php include("partials/offline/_offline_course.php"); ?>
