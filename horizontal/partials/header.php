<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/assets/images/favicon.png">
    <meta name="description" content="<?= $meta_description ?>">
    <meta name="robots" content="index,follow">
    <title> <?= $page_title ?> </title>
    <!-- Favicon -->
    <link href="/assets/img/brand/favicon" rel="icon" type="image/png">
    <!-- Your stylesheet-->
    <link rel="stylesheet" href="/assets/css/uikit.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="/assets/css/fontawesome.css">

    <!--  javascript -->
    <script src="/assets/js/simplebar.js"></script>
    <script src="/assets/js/uikit.js"></script>
</head>
<body>

<!-- PreLoader -->
<div id="spinneroverlay">
    <div class="spinner"></div>
</div>


<header class="tm-header" uk-sticky>
    <div class=" uk-background-grey uk-navbar-container uk-navbar-transparent uk-padding-small uk-navbar-sticky">
        <div class="uk-position-relative">
            <nav class="uk-navbar-transparent tm-mobile-header uk-animation-slide-top uk-position-z-index" uk-navbar>
                <!-- logo -->
                <!-- mobile icon for side nav on nav-mobile-->
                <span class="uk-hidden@m tm-mobile-menu-icon" uk-toggle="target: #mobile-sidebar"><i
                            class="fas fa-bars icon-large"></i></span>
                <!-- mobile icon for user icon on nav-mobile -->
                <span class="uk-hidden@m tm-mobile-user-icon uk-align-right"
                      uk-toggle="target: #tm-show-on-mobile; cls: tm-show-on-mobile-active"><i
                            class="fas fa-user icon-large"></i></span>
                <!-- mobile logo -->
                <a class="uk-hidden@m uk-logo" href="/"> Ahihi Programming</a>
                <div class="uk-navbar-left uk-visible@m">
                    <a href="/" class="uk-logo uk-margin-left"> <i class="fas fa-graduation-cap"> </i> Ahihi
                        Programming</a>
                </div>
                <div class="uk-navbar-right tm-show-on-mobile uk-flex-right" id="tm-show-on-mobile">
                    <!-- this will clouse after display user icon -->
                    <span class="uk-hidden@m tm-mobile-user-close-icon uk-align-right"
                          uk-toggle="target: #tm-show-on-mobile; cls: tm-show-on-mobile-active"><i
                                class="fas fa-times icon-large"></i></span>
                    <ul class="uk-navbar-nav uk-flex-middle">

                        <li>
                            <!--  night mode  -->
                            <a href="#"><i class="fas fa-moon icon-medium"></i></a>
                            <div uk-drop="pos: top-right ;mode:click ; offset: 20;animation: uk-animation-scale-up"
                                 class="uk-drop">
                                <div class="uk-card-small uk-box-shadow-xlarge uk-card-default uk-maring-small-left  border-radius-6">
                                    <div class="uk-card uk-card-default border-radius-6">
                                        <div class="uk-card-header">
                                            <h5 class="uk-card-title uk-margin-remove-bottom">Chuyển sang chế độ tối</h5>
                                        </div>
                                        <div class="uk-card-body">
                                            <p>Chuyển trang thành màu tối để xem video rõ hơn</p>
                                            <p class="uk-text-small uk-align-left uk-margin-remove  uk-text-muted">Chế độ tối </p>
                                            <!-- night mode button -->
                                            <div class="btn-night uk-align-right" id="night-mode">
                                                <label class="tm-switch">
                                                    <div class="uk-switch-button"></div>
                                                </label>
                                            </div>
                                            <!-- end  night mode button -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

                <!-- Navigation for mobile -->
                <?php include("partials/sidebar.php"); ?>

            </nav>
        </div>
    </div>
</header>