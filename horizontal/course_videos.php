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
include('includes/files.php');

if (!isset($_GET['course']) || !$_GET['course']) {
    if (isset($_GET['id']) && $_GET['id']) {
        $course = getCourseByVideoId($_GET['id']);
    } else {
        header("Location: index.php");
    }
} else {
    $course = getCourseBySlug($_GET['course']);
}

if (!$course) {
    header("Location: index.php");
}

//var_dump($course);
//die();

$video_groups = getVideoGroups($course['id']);

foreach ($video_groups as &$group) {
    $group['videos'] = getVideosByGroup($group['id']);
}

if (isset($_GET['id']) && $_GET['id']) {
    $currentVideo = getVideoById($_GET['id']);
} else {
    $currentVideo = $video_groups[0]['videos'][0];
}

$files = getFilesByVideoId($currentVideo['id']);


/*Page Title and Meta Tags for SEO*/
$page_title = "Video: " . $currentVideo['title'] . " - Ahihi Programming";
$meta_description = $currentVideo['description'];


?>

<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <meta name="description" content="<?= strip_tags(htmlspecialchars_decode(html_entity_decode($meta_description))) ?>">
    <title> <?= $page_title ?> </title>
    <!-- Favicon -->
    <link href="/assets/img/brand/favicon" rel="icon" type="image/png">
    <!-- Your stylesheet-->
    <link rel="stylesheet" href="/assets/css/uikit.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">
    <!--  javascript -->
    <script src="/assets/js/simplebar.js"></script>
    <script src="/assets/js/uikit.js"></script>
</head>
<body style="overflow: hidden;">

<?php if (isset($_GET['start'])): ?>
    <!-- Flash Message -->
    <div id="note">
        Chào mừng bạn đến với <strong><?= $course['name'] ?></strong>. Chúc bạn có được nhiều kiến thức bổ ích.
        <a class="uk-margin-medium-right uk-margin-remove-bottom uk-position-relative uk-icon-button uk-align-right  uk-margin-small-top"
           uk-toggle="target: #note; cls:uk-hidden"> <i class="fas fa-times  uk-position-center"></i> </a>
    </div>
<?php endif; ?>


<div class="tm-course-lesson">

    <!-- side nav icon -->
    <a href="/khoa-hoc/<?= $course['slug'] ?>">
        <i class="fas fa-angle-left icon-large tm-side-menu-icon"
           uk-tooltip="title: Back  ; delay: 200 ; pos: bottom-left; offset:20 ;animation:uk-animation-scale-up ;"></i>
    </a>


    <!-- mobile-sidebar  -->
    <i class="fas fa-video icon-large tm-side-right-mobile-icon uk-hidden@m" uk-toggle="target: #filters"></i>


    <!-- Your app page -->
    <div class="uk-grid-collapse" id="course-fliud" uk-grid>


        <!-- PreLoader -->
        <div id="spinneroverlay">
            <div class="spinner"></div>
        </div>
        <div class="uk-width-3-4@m uk-margin-auto">
            <header class="tm-course-content-header uk-background-grey">
                <a href="/khoa-hoc/<?= $course['slug'] ?>" class="back-to-dhashboard uk-margin-large-left"
                   uk-tooltip="title: Quay trở về Trang khóa học  ; delay: 200 ; pos: bottom-left ;animation:uk-animation-scale-up ; offset:20">
                    Quay về Khóa học</a>
            </header>


            <!--Course-side icon make Hidden sidebar -->
            <i class="fas fa-angle-right icon-large uk-float-right tm-side-course-icon  uk-visible@m"
               uk-toggle="target: #course-fliud; cls: tm-course-fliud"
               uk-tooltip="title: Hide sidebar  ; delay: 200 ; pos: bottom-right ;animation:uk-animation-scale-up ; offset:20"></i>


            <!--Course-side active icon -->
            <i class="fas fa-angle-left icon-large uk-float-right tm-side-course-active-icon uk-visible@m"
               uk-toggle="target: #course-fliud; cls: tm-course-fliud"
               uk-tooltip="title: Open sidebar  ; delay: 200 ; pos: bottom-right ;animation:uk-animation-scale-up ; offset:20"></i>
            <ul class="uk-subnav tm-course-content-nav"
                uk-switcher="animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium">
                <li>
                    <a href="#" uk-toggle="target: #course-fliud; cls: tm-course-fliud"> Nội dung </a>
                </li>
            </ul>

            <div class="tabcontent tab-default-open uk-padding  animation: uk-animation-slide-left-medium, uk-animation-slide-right-medium"
                 id="video-<?= $currentVideo['id'] ?>">
                <div class="video-responsive">
                    <iframe src="<?= $currentVideo['link'] ?>" frameborder="0" allowfullscreen
                            uk-responsive></iframe>
                </div>
            </div>
        </div>


        <!-- Sidebar-->
        <div class="uk-width-1-4@m uk-offcanvas tm-filters uk-background-default tm-side-course uk-animation-slide-right-medium"
             id="filters" uk-offcanvas="overlay: true; container: false; flip: true">
            <div class="uk-offcanvas-bar uk-padding-remove uk-preserve-color">


                <!-- Sidebar menu-->
                <ul class="uk-child-width-expand uk-tab tm-side-course-nav uk-margin-remove uk-position-z-index"
                    uk-switcher="animation: uk-animation-slide-right-medium, uk-animation-slide-left-small"
                    style="    box-shadow: 3px 0px 7px 1px gainsboro;" uk-switcher>


                    <!--Videos Tab Videos title-->
                    <li class="uk-active">
                        <a href="#"
                           uk-tooltip="title: Course Videos ; delay: 200 ; pos: bottom-left ;animation:uk-animation-scale-up">
                            <i class="fas fa-video icon-medium"></i> Videos </a>
                    </li>


                    <!--Videos Tab Files title-->
                    <li>
                        <a href="#"
                           uk-tooltip="title: Course Files ; delay: 200 ; pos: bottom-center ;animation:uk-animation-scale-up">
                            <i class="fas fa-folder icon-medium"></i> Mô tả </a>
                    </li>


                </ul>


                <!-- Sidebar contents -->
                <ul class="uk-switcher">


                    <!-- Course Video tab content  -->
                    <li>
                        <div class="demo1 tab-video" data-simplebar>
                            <ul uk-accordion>


                                <!-- section one -->
                                <?php for ($i = 0; $i < count($video_groups); $i++): ?>
                                    <li class="uk-open tm-course-lesson-section uk-background-default">
                                        <a class="uk-accordion-title  uk-padding-small" href="#"><h6>
                                                section <?= $i + 1 ?></h6> <h4
                                                    class="uk-margin-remove"><?= $video_groups[$i]['name'] ?></h4></a>
                                        <div class="uk-accordion-content uk-margin-remove-top">
                                            <div class="tm-course-section-list">
                                                <ul>


                                                    <?php foreach ($video_groups[$i]['videos'] as $video): ?>

                                                        <!--Edit javascripto stop video first and click-->
                                                        <a href="/watch/<?= $course['slug'] ?>~<?= $video['id'] ?>"
                                                           class="uk-link-reset tablinks"
                                                           id="defaultOpen">
                                                            <li id="course-1-1"
                                                                class="<?= $video['id'] == $currentVideo['id'] ? 'watched' : '' ?>">
                                                                <span class="uk-icon-button icon-play"> <i
                                                                            class="fas fa-play icon-small"></i> </span>
                                                                <div class="uk-panel uk-panel-box uk-text-truncate uk-margin-large-right"><?= $video['title'] ?></div>
                                                                <span class="uk-position-center-right time uk-margin-medium-right">  <?= formatVideoTime($video['duration']) ?></span>
                                                            </li>
                                                        </a>

                                                    <?php endforeach; ?>

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                <?php endfor; ?>


                            </ul>
                        </div>
                    </li>


                    <!--  Course resource File  tab content -->
                    <li>
                        <div class="demo1 uk-background-default" data-simplebar>
                            <img src="<?= $course['thumbnail'] ?>" width="200"
                                 class="uk-margin-remove-bottom uk-align-center uk-width-2-3 uk-margin-medium-top" alt="">
                            <p class="uk-padding-small uk-margin-remove uk-text-center uk-padding-remove-top"><?php ?></p>
                            <h4 class="uk-heading-line uk-text-center uk-margin-top"><span>Mô tả </span></h4>
                            <p class="uk-padding-small uk-margin-remove uk-padding-remove-top uk-text-center"><?= strip_tags($currentVideo['description']) ?></p>
                            <h5 class="uk-padding-small uk-margin-remove uk-background-muted uk-text-black"> Tài liệu
                                bài giảng </h5>

                            <div>

                                <?php foreach ($files as $file): ?>

                                    <div class="uk-grid-small" uk-grid>
                                        <div class="uk-width-1-4  uk-margin-small-top">
                                            <img src="/assets/images/icons/document.png" alt="Image"
                                                 class="uk-align-center img-small">
                                        </div>
                                        <div class="uk-width-3-4 uk-padding-remove-left">
                                            <p class="uk-margin-remove-bottom uk-text-bold  uk-text-small uk-margin-small-top">
                                                <?= $file['title'] ?> </p>
                                            <p class="uk-margin-remove-top uk-margin-small-bottom uk-margin-small-right"><?= $file['description'] ?></p>

                                            <a class="Course-tags uk-margin-small-right  border-radius-6 tags-active"
                                               href="<?= $file['link'] ?>">
                                                Tải về </a>
                                        </div>
                                    </div>
                                    <hr class="uk-margin-remove-bottom">

                                <?php endforeach; ?>

                            </div>


                        </div>
                    </li>


                </ul>
            </div>
        </div>


    </div>
</div>


<!-- app end -->
<!--  Night mood -->
<script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);


    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('night-mode');
            if (document.documentElement.classList.contains('night-mode')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);

    // Preloader
    var spinneroverlay = document.getElementById("spinneroverlay");
    window.addEventListener('load', function () {
        spinneroverlay.style.display = 'none';
    });


</script>
</body>

</html>
