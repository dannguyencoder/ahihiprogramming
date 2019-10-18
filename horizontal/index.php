<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('includes/connect_db.php');
include('includes/constants.php');
include('includes/helpers.php');

include('includes/courses.php');
include('includes/videos.php');

// latest videos
$latest_videos = getVideos(6);

// courses: grammar
$web_development_courses = getCourses('lap-trinh-web', null, 6);

// courses: vocabulary
$mobile_app_courses = getCourses('lap-trinh-mobile', null, 6);

// courses: communication
$programming_basics_courses = getCourses('nen-tang-lap-trinh', null, 6);


/*Page Title and Meta Tags for SEO*/
$page_title = "Ahihi Programming - Học lập trình cho mọi nhà";
$meta_description = "Học lập trình trực tuyến qua các videos và bài giảng thú vị từ các giáo viên giỏi hàng đầu.";

?>

<!-- header  -->
<?php include("partials/header.php"); ?>

<!-- Navigation  -->
<?php include("partials/navbar.php"); ?>

<!--Page Content-->
<main class="uk-margin-medium-bottom">
    <!-- course feature bg -->
    <div class="hero-feature-bg"></div>
    <div class="uk-container">
        <div class="uk-container">
            <div class="uk-position-relative uk-margin-medium-top none-border uk-clearfix">
                <div class="uk-float-left">
                    <h4 class="uk-text-white uk-margin-remove uk-text-light"> Video mới nhất </h4>
                </div>
            </div>
        </div>


        <div class="uk-position-relative uk-visible-toggle  uk-container uk-padding-medium" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-3@s uk-child-width-1-4@m uk-grid">
                <?php foreach ($latest_videos as $video): ?>
                <li class="uk-active">
                    <a href="/watch/~<?= $video['id'] ?>">
                        <div class="uk-card-default uk-card-hover  uk-card-small feature-card uk-inline-clip">
                            <img class="course-img" src="<?= $video['thumbnail']  ?>">
                            <div class="uk-card-body">
                                <h4><?= $video['title'] ?></h4>
                                <p><?= substrwords($video['description'], 150) ?></p>
                            </div>
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>

            <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button" href="#" uk-slidenav-next uk-slider-item="next"></a>

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>

    </div>
    <!-- end feature contant-->

    <!--  Page Content  -->
    <div class="uk-container" id="more">
        
        <?php 
        // topic 1: web development
        $topic = 'lap-trinh-web';
        $courses = $web_development_courses;
        include('partials/index/_topic.php');

        // topic 2: mobile app
        $topic = 'lap-trinh-mobile';
        $courses = $mobile_app_courses;
        include('partials/index/_topic.php');

        // topic 3: programming basics
        $topic = 'nen-tang-lap-trinh';
        $courses = $programming_basics_courses;
        include('partials/index/_topic.php');
        ?>
    </div>
</main>

<!-- footer -->
<?php include("partials/footer.php"); ?>
