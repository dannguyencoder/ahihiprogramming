<div class="uk-section-small uk-section-default">
    <hr class="uk-margin-remove">
    <div class="uk-container uk-align-center uk-margin-remove-bottom uk-position-relative">
        <div uk-grid>
            <div class="uk-width-1-2@m uk-width-1-2@s uk-first-column">
                <a href="/" class="uk-link-heading uk-text-lead uk-text-bold"> <i
                        class="fas fa-graduation-cap"></i> Ahihi Programming</a>
                <div class="uk-width-xlarge">Lớp học lập trình dành cho mọi nhà, mọi lứa tuổi, già trẻ gái trai nam nữ ai cũng được học lập trình
                </div>
                <div class="uk-width-xlarge uk-margin-small-top"><strong>Hotline:</strong> 0326.155.977
                </div>
                <div class="uk-width-xlarge"><strong>Email:</strong> ahihi.programming@gmail.com
                </div>
            </div>
            <div class="uk-width-expand@m uk-width-1-2@s">
                <ul class="uk-list tm-footer-list">
                    <li>
                        <a href="/topic/lap-trinh-web"> Lập trình Web </a>
                    </li>
                    <li>
                        <a href="/topic/lap-trinh-mobile"> Lập trình Mobile </a>
                    </li>
                </ul>
            </div>
            <div class="uk-width-expand@m uk-width-1-2@s">
                <ul class="uk-list tm-footer-list">
                    <li>
                        <a href="/topic/nen-tang-lap-trinh">Nền tảng Lập trình </a>
                    </li>
                    <li>
                        <a href="/lop-offline">Lớp học Offline </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="uk-postion-absoult uk-margin-remove uk-position-bottom-right uk-visible@s" style="bottom: 8px;right: 60px;"
           uk-tooltip="title: Visit Our Site; pos: top-center"> Website được làm bởi <a href="https://www.facebook.com/ahihiprogramming" target="_blank"
                                                                                        class="uk-text-bold uk-link-reset">
                Ahihi Programming</a></p>
        <div class="uk-margin-small" uk-grid>
            <div class="uk-width-1-2@m uk-width-1-2@s uk-first-column">
                <p class="uk-text-small"><i class="fas fa-copyright"></i> 2019 <span
                        class="uk-text-bold">Ahihi Programming</span> . All rights reserved.</p>
            </div>
            <div class="uk-width-1-3@m uk-width-1-2@s">
                <a href="https://www.youtube.com/channel/UCQDo7A_kmCakuJHKY9c4BuQ" target="_blank" class="uk-icon-button uk-link-reset"
                   uk-tooltip="title: Youtube của Ahihi; pos: top-center"><i class="fab fa-youtube"
                                                                              style=" color: #fb7575  !important;"></i></a>
                <a href="https://www.facebook.com/ahihiprogramming" target="_blank" class="uk-icon-button uk-link-reset" uk-tooltip="title: Facebook của Ahihi; pos: top-center"><i
                        class="fab fa-Facebook" style=" color: #9160ec  !important;"></i></a>
                <a href="https://www.instagram.com/ahihi.programming/" target="_blank" class="uk-icon-button uk-link-reset" uk-tooltip="title: Instagram của Ahihi; pos: top-center"><i
                        class="fab fa-Instagram" style=" color: #dc2d2d  !important;"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- footer  end -->

<!-- app end -->
<!-- button scrollTop -->
<button id="scrollTop" class="uk-animation-slide-bottom-medium">
    <a href="#" class="uk-text-white" uk-totop uk-scroll></a>
</button>
<!--  Night mode -->
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

    //scrollTop
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollTop").style.display = "block";
        } else {
            document.getElementById("scrollTop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>
</body>

</html>

<?php $db = null; ?>