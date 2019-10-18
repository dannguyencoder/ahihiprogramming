<div class="uk-navbar-sticky uk-background-grey "
     uk-sticky="show-on-up: true; animation: uk-animation-slide-top;offset: 85">
    <nav class="uk-padding-small uk-visible@m uk-navbar-transparent uk-animation-slide-to uk-position-z-index"
         uk-navbar>
        <div class="uk-flex uk-flex-center uk-width-expand">
            <ul class="uk-subnav uk-subnav-2">
                <li class="<?php if ($_SERVER['REQUEST_URI'] == "/" || strpos($_SERVER['REQUEST_URI'], "/index.php") !== false) { echo "uk-active"; } ?>">
                    <a href="/"> <i class="fas fa-home icon-medium uk-margin-small-right"></i> Trang chủ</a>
                </li>
                <li class="<?php if (strpos($_SERVER['REQUEST_URI'], "/topic/lap-trinh-web") !== false || (isset($course) && $course['topic'] == 'lap-trinh-web')) { echo "uk-active"; } ?>">
                    <a href="/topic/lap-trinh-web"> <i class="fas fa-book-open icon-medium uk-margin-small-right"></i> Lập trình Web </a>
                </li>
                <li class="<?php if (strpos($_SERVER['REQUEST_URI'], "/topic/lap-trinh-mobile") !== false || (isset($course) && $course['topic'] == 'lap-trinh-mobile')) { echo "uk-active"; } ?>">
                    <a href="/topic/lap-trinh-mobile"> <i class="fas fa-book-open icon-medium uk-margin-small-right"></i> Lập trình Mobile </a>
                </li>
                <li class="<?php if (strpos($_SERVER['REQUEST_URI'], "/topic/nen-tang-lap-trinh") !== false || (isset($course) && $course['topic'] == 'nen-tang-lap-trinh')) { echo "uk-active"; } ?>">
                    <a href="/topic/nen-tang-lap-trinh"> <i class="fas fa-book-open icon-medium uk-margin-small-right"></i> Nền tảng </a>
                </li>
                <li class="<?php if (strpos($_SERVER['REQUEST_URI'], "/lop-offline") !== false) { echo "uk-active"; } ?>">
                    <a href="/lop-offline"> <i class="fas fa-users icon-medium uk-margin-small-right"></i> Lớp học Offline </a>
                </li>
            </ul>
        </div>
    </nav>
</div>