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

$course = getSingleCourseByTopicAndType('lop-offline', 'offline-3');

$video_groups = getVideoGroups($course['id']);

foreach ($video_groups as &$group) {
    $group['videos'] = getVideosByGroup($group['id']);
}

/*Page Title and Meta Tags for SEO*/
$page_title = "Lớp học Lập trình Mobile - Ahihi Programming";
$meta_description = "Huấn luyện bạn trở thành những người Lập trình Mobile chuyên nghiệp trên môi trường quốc tế.";

?>

<?php include("partials/offline/_offline_course.php"); ?>
