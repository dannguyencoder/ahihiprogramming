<li>
    <div class="uk-card-default uk-card-hover uk-card-small Course-card uk-inline-clip uk-transition-toggle">
        <a href="/khoa-hoc/<?= $course['slug'] ?>" class="uk-link-reset">
            <img src="<?= $course['thumbnail'] ?>" class="course-img">
            <div class="uk-card-body">
                <h4><?= $course['name'] ?></h4>
                <p><?= htmlspecialchars_decode($course['short_description']) ?></p>
                <hr class="uk-margin-remove-top">
                <div class="uk-clearfix"></div>
                <div class="uk-float-left">
                    <a class="Course-tags uk-margin-small-right" href="/topic.php">
                        <?= TOPICS[$course['topic']]['name'] ?> </a>
                    <div uk-drop="pos: top-left;animation: uk-animation-slide-bottom-medium"
                            class="uk-drop">
                        <div class="uk-card uk-card-body uk-card-default Course-tooltip-dark anglie-left-bottom-dark">
                            <span> <?= TOPICS[$course['topic']]['description'] ?> </span>
                        </div>
                    </div>
                    <a class="Course-tags" href="/topic.php"> <?= TYPES[$course['type']]['name'] ?> </a>
                    <div uk-drop="pos: top-center;animation: uk-animation-slide-bottom-small"
                            style="width:auto !important" class="uk-drop">
                        <div class="uk-card uk-padding-small uk-card-default Course-tooltip-dark anglie-center-bottom-dark">
                            <span> <?= TYPES[$course['type']]['description'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</li>