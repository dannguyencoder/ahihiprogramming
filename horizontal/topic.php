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
include('includes/videos.php');


if (!isset($_GET['slug']) || !isset(TOPICS[$_GET['slug']])) {
    header("Location: index.php");
}

$topic_slug = $_GET['slug'];

// latest videos
$latest_videos = getVideosByTopic($topic_slug, 6);

// courses: grammar, type = 'tong-quat'
$courses_general = getCourses($topic_slug, 'tong-quat', 6);


// courses: grammar, type = 'chuyen de'
$courses_specific = getCourses($topic_slug, 'chuyen-de', 6);


/*Page Title and Meta Tags for SEO*/
$page_title = "Các khóa học " . TOPICS[$topic_slug]['name'] . " - Ahihi Programming";
$meta_description = "Các videos học " . TOPICS[$topic_slug]['name'] . " của Ahihi Programming nhằm giúp bạn giỏi " . TOPICS[$topic_slug]['name'] . " trong thời gian ngắn nhất";

?>

<!-- header  -->
<?php include("partials/header.php"); ?>

<!-- Navigation  -->
<?php include("partials/navbar.php"); ?>

<main>
    <!--  feature bg -->
    <div class="hero-feature-bg"></div>
    <div class="uk-container">
        <div class="uk-container">
            <div class="uk-position-relative uk-margin-medium-top uk-clearfix">
                <div class="uk-float-left">
                    <h1 class="uk-text-white"><?= TOPICS[$topic_slug]['name'] ?> </h1>
                    <h4 class="uk-text-white uk-margin-remove uk-text-light">Video mới nhất </h4>
                </div>
            </div>
        </div>
        <!-- slider -->


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

            <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button" href="#"
               uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button"
               href="#" uk-slidenav-next uk-slider-item="next"></a>

            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>


    </div>
    <div class="uk-container uk-margin-top" id="more">
        <div class="section-heading none-border">
            <h3 class="uk-margin-remove-bottom">Khóa học tổng quát</h3>
            <p>Bạn không biết bắt đầu từ đâu ? Hãy học tổng quát trước</p>
        </div>
        <!-- slider -->
        <div class="uk-position-relative uk-visible-toggle" id="browse-videos" uk-slider>


            <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid>


                <?php foreach ($courses_general as $course): ?>
                    <li class="uk-active">
                        <div class="uk-card uk-card-default uk-card-small uk-card-hover border-radius-6 Course-card">
                            <a href="/khoa-hoc/<?= $course['slug'] ?>" class="uk-position-cover"></a>
                            <img class="course-img" src="<?= $course['thumbnail'] ?>">
                            <div class="uk-card-body">
                                <h5 class="uk-margin uk-margin-remove-bottom"> <?= $course['name'] ?> </h5>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>


            </ul>


            <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button" href="#"
               uk-slidenav-previous uk-slider-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-hidden-hover uk-icon-button"
               href="#" uk-slidenav-next uk-slider-item="next"></a>
            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">
                <li uk-slider-item="0" class="">
                    <a href="#"></a>
                </li>
            </ul>
        </div>
        <!-- end slider -->


        <div class="section-heading uk-position-relative uk-margin-medium-top none-border uk-clearfix">
            <div class="uk-float-left">
                <h3 class="uk-margin-remove-bottom"> Khóa học Chuyên đề</h3>
                <p>Bạn đã có căn bản nhưng chỉ thiếu một số kiến thức ? Hãy học chuyên đề</p>
            </div>
        </div>
        <div class="uk-margin uk-grid-match uk-child-width-1-3@m uk-child-width-1-2@s"
             uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 200" uk-grid>


            <?php foreach ($courses_specific as $course): ?>
                <div>
                    <a href="/khoa-hoc/<?= $course['slug'] ?>">
                        <div class="uk-card-default uk-card-hover uk-card-small uk-margin-medium-bottom uk-inline-clip border-radius-6 Course-card">
                            <img class="course-img" src="<?= $course['thumbnail'] ?>">
                            <div class="uk-card-body">
                                <h4 class="uk-margin uk-margin-remove-bottom"> <?= $course['name'] ?> </h4>
                                <p> <?= substrwords($course['short_description'], 150) ?> </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>


        </div>

    </div>
</main>


<!-- footer -->
<?php include("partials/footer.php"); ?>

