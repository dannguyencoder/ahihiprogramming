<!-- Nav for  mobile  -->
<div class="tm-mobile-header uk-hidden@m">
    <nav class="uk-navbar-container uk-navbar" uk-navbar="">
        <div class="uk-navbar-left">
            <a class="uk-hidden@m uk-logo" href="index" style="left: 0;"> Ahihi Programming </a>
        </div>
        <div class="uk-navbar-right">
            <a class="uk-navbar-toggle" href="#tm-mobile" uk-toggle>
                <div class="uk-navbar-toggle-icon">
                    <i class="fas fa-bars icon-large uk-text-black"></i>
                </div>
            </a>
        </div>
    </nav>
    <!-- model mobile menu -->
    <div id="tm-mobile" class="uk-modal-full uk-modal" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-text-center uk-flex" uk-height-viewport>
            <button class="uk-modal-close-full uk-close uk-icon" type="button" uk-close></button>
            <div class="uk-margin-auto-vertical uk-width-1-1">
                <div class="uk-child-width-1-1" uk-grid>
                    <div>
                        <div class="uk-panel">
                            <ul class="uk-nav uk-nav-primary uk-nav-center nav-white">
                                <li class="uk-active">
                                    <a href="/">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="/topic/lap-trinh-web">Lập trình Web</a>
                                </li>
                                <li>
                                    <a href="/topic/lap-trinh-mobile">Lập trình Mobile</a>
                                </li>
                                <li>
                                    <a href="/topic/nen-tang-lap-trinh">Nền tảng</a>
                                </li>
                                <li>
                                    <a href="/lop-offline">Lớp học Offline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="uk-panel widget-text" id="widget-text-1">
                            <div class="textwidget">
                                <p class="uk-text-center"><a class="uk-button uk-button-success uk-button-large"
                                                             href="http://bit.ly/coHongThayVinh"> Đăng ký ngay </a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navbar   -->
<div class="tm-header uk-visible@m tm-header-transparent uk-margin-top">
    <div uk-sticky media="768" animation="uk-animation-slide-top" cls-active="uk-navbar-sticky uk-nav-dark"
         sel-target=".uk-navbar-container"
         top=".tm-header ~ [class*=&quot;uk-section&quot;], .tm-header ~ * > [class*=&quot;uk-section&quot;]"
         cls-inactive="uk-navbar-transparent   uk-dark" class="uk-sticky uk-navbar-container">
        <div class="uk-container  uk-position-relative">
            <nav class="uk-navbar uk-navbar-transparent">
                <!-- logo -->
                <div class="uk-navbar-left">
                    <a href="/" class="uk-logo"><i class="fas fa-graduation-cap"></i> Ahihi Programming</a>
                </div>
                <!-- right navbar  -->
                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav toolbar-nav">
                        <li>
                            <a href="/">Trang chủ</a>
                        </li>
                        <li>
                            <a href="/topic/lap-trinh-web">Lập trình Web</a>
                        </li>
                        <li>
                            <a href="/topic/lap-trinh-mobile">Lập trình Mobile</a>
                        </li>
                        <li>
                            <a href="/topic/nen-tang-lap-trinh">Nền tảng</a>
                        </li>
                        <li class="uk-active">
                            <a href="/lop-offline">Lớp học Offline</a>
                        </li>
                    </ul>
                    <a class="el-content uk-button uk-button-success uk-circle" href="http://bit.ly/coHongThayVinh"> Đăng ký
                        ngay <i class="fas fa-paper-plane"></i> </a>
                </div>
            </nav>
        </div>
    </div>
</div>