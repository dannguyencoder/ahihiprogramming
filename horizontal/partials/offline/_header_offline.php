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
    <title> <?= $page_title ?> </title>
    <!-- Favicon -->
    <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">
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