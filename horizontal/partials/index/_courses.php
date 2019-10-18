<div class="uk-position-relative uk-visible-toggle uk-slider uk-slider-container" uk-slider="">
    <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s uk-grid" uk-scrollspy="target: > li; cls:uk-animation-slide-bottom-small; delay: 300">
        <?php 
        foreach ($courses as $course) {
            include('_course.php');
        }
        ?>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-icon-button uk-slidenav-previous uk-icon uk-slidenav"
        href="#" uk-slidenav-previous="" uk-slider-item="previous">
        <svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg">
            <polyline fill="none" stroke="#000" stroke-width="1.4"
                        points="12.775,1 1.225,12 12.775,23 "></polyline>
        </svg>
    </a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-icon-button uk-slidenav-next uk-icon uk-slidenav"
        href="#" uk-slidenav-next="" uk-slider-item="next">
        <svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg">
            <polyline fill="none" stroke="#000" stroke-width="1.4"
                        points="1.225,23 12.775,12 1.225,1 "></polyline>
        </svg>
    </a>

    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
</div>