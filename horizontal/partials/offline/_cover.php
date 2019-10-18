<div class="uk-section-default" tm-header-transparent="dark" tm-header-transparent-placeholder="">
    <div data-src="/assets/images/backgrounds/home-heros.jpg" uk-img
         class="uk-background-norepeat uk-background-center-center uk-background-fixe uk-section uk-section-large uk-padding-remove-top uk-flex uk-flex-middle uk-background-cover"
         uk-height-viewport="offset-top: true" style="box-sizing: border-box; min-height: calc(100vh - 0px);">
        <div class="uk-width-1-1 uk-margin-xlarge-top">
            <div class="uk-container">
                <div class="uk-grid-margin uk-grid uk-grid-stack" uk-grid="">
                    <div class="uk-width-1-1@m uk-first-column uk-margin-large-top">
                        <h2 class="uk-margin-remove-vertical uk-text-white  uk-h1 uk-scrollspy-inview uk-animation-slide-top-small">Lớp học <br> <?= $course['name'];  ?> </h2>
                        <div class="uk-scrollspy-inview uk-light uk-animation-slide-top-small uk-text-medium uk-text-large  uk-text-light" style="max-width: 50%">
                            <?= htmlspecialchars_decode($course['short_description'])  ?></div>
                        <a class="el-content uk-button uk-button-success uk-button-large  uk-circle"
                           href="http://bit.ly/coHongThayVinh">
                            Đăng ký </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>