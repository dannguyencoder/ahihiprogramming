<div uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 300">
    <div class="section-heading uk-position-relative uk-margin-medium-top none-border uk-clearfix">
        <div class="uk-float-left">
            <h3 class="uk-margin-remove-bottom"><?= TOPICS[$topic]['name'] ?></h3>
            <p><?= TOPICS[$topic]['description'] ?></p>
        </div>
        <div class="uk-float-right">
            <a href="/topic/<?= $topic ?>" class="uk-button uk-button-grey">Xem thêm</a>
        </div>
    </div>

    <?php include('_courses.php'); ?>
</div>