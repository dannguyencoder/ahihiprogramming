<div class="uk-section uk-section-muted" style="background: #eef5fd;">
    <div class="uk-container uk-align-center" uk-scrollspy="cls:uk-animation-fade">
        <div uk-grid>
            <div class="uk-width-2-3@m uk-padding-remove-bottom">

                <div uk-grid="" class="uk-grid">
                    <div class="uk-width-expand uk-first-column">
                        Nội dung khóa học
                    </div>
                    <div class="uk-width-auto">
<!--                        <span> 36 buổi </span>-->
                        <span> 1.5 giờ/buổi </span>
                    </div>
                </div>

                <ul uk-accordion="multiple: true" class="uk-accordion">


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
                                                            class="fas fa-book-open icon-small"></i> </span>
                                                    <!-- Course title  -->
                                                    <div class="uk-panel uk-panel-box uk-text-truncate uk-margin-medium-right">
                                                        <?= $video['title'] ?>
                                                    </div>
                                                </a>

                                            </li>
                                        <?php endforeach; ?>


                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php endfor; ?>



                </ul>


            </div>
            <div class="uk-width-1-3@m uk-position-relative">


                <h2 uk-scrollspy="cls:uk-animation-slide-right-medium"> Nội dung đào tạo </h2>
                <div class="uk-text-bold" uk-scrollspy="cls:uk-animation-scale-up"><?= htmlspecialchars_decode($course['long_description'])  ?></div>
            </div>
        </div>
    </div>
</div>