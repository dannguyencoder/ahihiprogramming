<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<?php

require_once('includes/connect_db.php');
include('includes/constants.php');
include('includes/helpers.php');

include('includes/users.php');
include('includes/courses.php');
include('includes/video_groups.php');
include('includes/videos.php');

if (!isset($_GET['slug'])) {
    header("Location: index.php");
}

$course = getCourseBySlug($_GET['slug']);

$course['total_duration'] = getCourseTotalDuration($course['id'])['total_duration'];
$course['number_of_videos'] = getNumberOfCourseVideos($course['id'])['number_of_videos'];

if (!$course) {
    header("Location: index.php");
}

$video_groups = getVideoGroups($course['id']);

foreach ($video_groups as &$group) {
    $group['videos'] = getVideosByGroup($group['id']);
}

$user = getUserById($course['user_id']);
$user['number_of_courses'] = getNumberOfCoursesByUser($course['user_id']);


/*Page Title and Meta Tags for SEO*/
$page_title = $course['name'] . " - Ahihi Programming";
$meta_description = strip_tags(html_entity_decode(htmlspecialchars_decode($course['short_description'])));

?>

<!-- header  -->
<?php include("partials/header.php"); ?>

<!-- Navigation  -->
<?php include("partials/navbar.php"); ?>


<!--Page Content-->
<main class="uk-margin-medium-bottom">
    <div class="course-intro-3 topic1">
        <div class="uk-container">
            <div class=" uk-flex-bottom" uk-grid>
                <div class="uk-width-2-3@m info">
                    <h2 class="uk-light uk-text-uppercase uk-text-bold uk-text-white uk-margin-top"><?= $course['name'] ?> </h2>
                    <div class="uk-light uk-text-bold"><?= htmlspecialchars_decode($course['short_description']) ?></div>

                </div>
            </div>
        </div>
    </div>
    <div class="uk-container">
        <div uk-grid>
            <div class="uk-width-2-3@m uk-margin-top">

                <h3 class="uk-margin-top"> Về khóa học</h3>

                <div>

                    <?= htmlspecialchars_decode($course['long_description']) ?>

                </div>


                <!-- Course video section -->
                <div uk-grid>
                    <div class="uk-width-expand">
                        Nội dung khóa học
                    </div>
                    <div class="uk-width-auto">
                        <span> 100 bài giảng </span>
                        <span> 10 giờ </span>
                    </div>
                </div>


                <!--Videos Content-->
                <ul uk-accordion class="uk-accordion">


                    <?php for($i = 0; $i < count($video_groups); $i++): ?>
                        <!--Video Group-->
                        <li class="uk-open tm-course-lesson-section uk-background-default">
                            <a class="uk-accordion-title uk-padding-small" href="#"><h6> section <?= $i + 1 ?></h6> <h4
                                        class="uk-margin-remove"> <?= $video_groups[$i]['name']  ?></h4></a>
                            <div class="uk-accordion-content uk-margin-remove-top">
                                <div class="tm-course-section-list">
                                    <ul>

                                        <!--Video-->
                                        <?php foreach ($video_groups[$i]['videos'] as $video): ?>
                                        <li>
                                            <a href="/watch/~<?= $video['id'] ?>" class="uk-link-reset">
                                                <!-- Play icon  -->
                                                <span class="uk-icon-button icon-play"> <i
                                                            class="fas fa-play icon-small"></i> </span>
                                                <!-- Course title  -->
                                                <div class="uk-panel uk-panel-box uk-text-truncate uk-margin-medium-right">
                                                    <?= $video['title'] ?>
                                                </div>
                                                <!-- preview link -->
                                            </a>
                                            <a class="uk-link-reset uk-margin-large-right uk-position-center-right uk-padding-small uk-text-small uk-visible@s"
                                               href="#preview-video-<?= $video['id'] ?>" uk-toggle> <i
                                                        class="fas fa-play icon-small uk-text-grey"></i>  </a>
                                            <!-- time -->
                                            <span class="uk-position-center-right time uk-margin-right"> <i
                                                        class="fas fa-clock icon-small"></i>  <?= formatVideoTime($video['duration'])  ?> </span>

                                            <!-- Model  Preview videos-->
                                            <div id="preview-video-<?= $video['id'] ?>" uk-modal>
                                                <div class="uk-modal-dialog uk-margin-auto-vertical">
                                                    <button class="uk-modal-close-outside" type="button" uk-close></button>
                                                    <div class="video-responsive">
                                                        <iframe src="<?= $video['link']  ?>" class="uk-padding-remove" uk-video="automute: true" frameborder="0" allowfullscreen uk-responsive></iframe>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <?php endforeach; ?>


                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php endfor; ?>


                </ul>



                <!-- Instructor section -->
                <h2 class="uk-heading-line uk-text-left"><span> Giảng viên  </span></h2>
                <div class="uk-grid-small  uk-margin-medium-top uk-padding-small" uk-grid>
                    <div class="uk-width-1-4@m uk-first-column">
                        <img alt="Image"
                             class="uk-width-2-3 uk-margin-small-top uk-margin-small-bottom uk-border-circle uk-box-shadow-large  uk-animation-scale-up"
                             src="<?= $user['avatar'] ?>">
                        <div class="uk-text-small uk-margin-small-top">
                            <p><i class="fas fa-star"></i> <?= $user['email']  ?> </p>
                            <p><i class="fas fa-comment-dots"></i> <?= $user['phone_number'] ?> </p>
                            <p><i class="fas fa-play"></i> <?= $user['number_of_courses'] ?> khóa học </p>
                        </div>
                    </div>
                    <div class="uk-width-3-4@m uk-padding-remove-left">
                        <h4 class="uk-margin-remove"> <?= $user['full_name']  ?> </h4>
                        <span class="uk-text-small">  <?= $user['title']  ?> </span>
                        <hr class="uk-margin-small">
                        <div>
                            <?= htmlspecialchars_decode($user['description'])  ?>
                        </div>

                    </div>
                </div>

            </div>
            <!-- Sidebar video  demo box -->
            <div class="uk-width-1-3@m uk-flex-last@s uk-flex-first">
                <div class="course-intro-3-preview-video"
                     uk-sticky="offset:160;bottom:true;animation: uk-animation-slide-top-medium; bottom ; media: @s"
                     cls-active=" uk-box-shadow-large">
                    <div class="uk-inline uk-visible-toggle Course-card">
                        <img class="course-img" src="<?= $course['thumbnail']  ?>" alt="">
                        <a class="uk-position-absolute uk-position-center uk-invisible-hover uk-link-reset"
                           href="#preview-video-<?= $video_groups[0]['videos'][0]['id'] ?>" uk-toggle> <i class="fas fa-play-circle" style="font-size: 60px"></i>
                        </a>
                    </div>
                    <div class="content-inner">

                        <p class="uk-margin-remove"><span
                                    class="uk-text-large uk-text-bold"> Miễn phí </span> <s
                                    class="uk-margin-small-left"> <?= number_format($course['old_price']) ?> VND </s></p>
<!--                        <p class="uk-margin-small "> Học Online </p>-->
                        <div class="uk-child-width-1-1 uk-grid-small uk-margin-small" uk-grid>
                            <div>
                                <a class="uk-button uk-button-default uk-width-1-1 uk-button-danger uk-box-shadow-medium"
                                   href="/watch/<?= $course['slug'] ?>~/start"> Bắt đầu </a>
                            </div>
                        </div>

                        <p class="uk-margin-small uk-text-small uk-text-bold"> Khóa học này bao gồm </p>
                        <div class="uk-child-width-1-2 uk-grid-small uk-text-small" uk-grid>
                            <div>
                                <span> <?= formatVideoTime($course['total_duration']) ?> videos </span>
                            </div>
                            <div>
                                <span> <?= $course['number_of_videos']  ?> bài giảng  </span>
                            </div>
                            <div>
                                <span> <?= count($video_groups)  ?> chủ đề  </span>
                            </div>
                            <div>
                                <span> Xem trọn đời  </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<!-- footer -->
<?php include("partials/footer.php"); ?>
