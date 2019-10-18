<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*Page Title and Meta Tags for SEO*/
$page_title = "Học offline cùng Ahihi Programming";
$meta_description = "Huấn luyện bạn trở thành lập trình viên thành thạo.";

?>

<!-- header  -->
<?php include("partials/offline/_header_offline.php"); ?>

<!-- Navigation  -->
<?php include("partials/offline/_navbar_offline.php") ?>


<!--Page Content-->
<div class="uk-section-default">
    <div data-src="/assets/images/backgrounds/bg-pricing-page.jpg" uk-img=""
         class="uk-background-norepeat uk-background-bottom-center uk-background-image@s   uk-section uk-section-large uk-padding-remove-top uk-flex uk-flex-middle uk-background-success uk-background-position-bottom"
         uk-height-viewport="offset-top: true"
         style="box-sizing: border-box; min-height: calc(0px + 100vh); background-image: url("assets/images/backgrounds/bg-pricing-page.jpg");">
    <div class="uk-width-1-1">
        <div class="uk-container">
            <div class="tm-header-placeholder uk-margin-remove-adjacent" style="height: 106px"></div>
            <h4 class="uk-text-center uk-margin-remove-bottom uk-text-bold uk-light">
                Học tại lớp Offline của Ahihi </h4>
            <h1 class="uk-text-white uk-text-center uk-text-bold uk-margin-medium-bottom uk-margin-small-top">
                Tăng cường chuyên môn lập trình của bạn</h1>
            <div class="uk-grid-collapse uk-grid-match uk-child-width-expand@s uk-text-center uk-grid" uk-grid="">
                <div class="uk-first-column">
                    <div class="uk-card uk-card-body uk-card-default border-radius-3 uk-margin-medium-top">
                        <h3 class="uk-text-bold"> Nền tảng Lập trình&nbsp;</h3>
                        <h1 class="uk-heading-divider uk-margin-small-top uk-text-primary uk-text-bold">200k/buổi </h1>
                        <ul class="uk-list uk-list-large">
                            <li>&#10004; Cấu trúc dữ liệu và Giải thuật</li>
                            <li>&#10004; Cơ sở dữ liệu và SQL</li>
                            <li>&#10004; Lập trình Java cơ bản</li>
                            <li>&#10004; Hệ điều hành Linux</li>
                            <li>&#10004; Git</li>
                            <li>&#10004; Luyện thi phỏng vấn Lập trình</li>
                        </ul>
                        <a class="uk-button uk-button-primary uk-button-large" href="/lop-offline/nen-tang-lap-trinh">Chi tiết lớp học <i class="fas fa-angle-double-right"></i> </a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large border-radius-3">
                        <h3 class="uk-text-bold">Lập trình Web</h3>
                        <h1 class="uk-text-bold uk-heading-divider uk-margin-small-top uk-text-success">250k/buổi </h1>
                        <ul class="uk-list uk-list-large">
                            <li>&#10004; HTML, CSS cơ bản và nâng cao</li>
                            <li>&#10004; Javascript cơ bản và nâng cao</li>
                            <li>&#10004; PHP & MySQL cơ bản và nâng cao</li>
                            <li>&#10004; Laravel Framework</li>
                            <li>&#10004; Tự tay làm dự án "một mình"</li>
                            <li>&#10004; Tự tin đi phỏng vấn</li>
                        </ul>
                        <a class="uk-button uk-button-success uk-button-large" href="/lop-offline/lap-trinh-web">Chi tiết lớp học <i class="fas fa-angle-double-right"></i> </a>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-body uk-card-default border-radius-3 uk-margin-top uk-margin-medium-top">
                        <h3 class="uk-text-bold">Lập trình Mobile</h3>
                        <h1 class="uk-text-bold uk-margin-small-top uk-heading-divider uk-text-danger">200k/buổi</h1>
                        <ul class="uk-list uk-list-large">
                            <li>&#10004; HTML, CSS cơ bản</li>
                            <li>&#10004; Javascript cơ bản</li>
                            <li>&#10004; ReactJS, NodeJS cơ bản</li>
                            <li>&#10004; React Native cơ bản và nâng cao&nbsp;</li>
                            <li>&#10004; Tự tay làm dự án "một mình"</li>
                            <li>&#10004; Tự tin đi phỏng vấn</li>
                        </ul>
                        <a class="uk-button uk-button-large uk-button-danger" href="/lop-offline/lap-trinh-mobile">Chi tiết lớp học <i class="fas fa-angle-double-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- footer -->
<?php include("partials/footer.php"); ?>
