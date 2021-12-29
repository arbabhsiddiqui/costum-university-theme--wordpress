<footer class="site-footer">
    <div class="site-footer__inner container container--narrow">
        <div class="group">
            <div class="site-footer__col-one">
                <h1 class="school-logo-text school-logo-text--alt-color">
                    <a href="<?= site_url() ?>"><strong>Fictional</strong> University</a>
                </h1>
                <p><a class="site-footer__link" href="#">555.555.5555</a></p>
            </div>

            <div class="site-footer__col-two-three-group">
                <div class="site-footer__col-two">
                    <h3 class="headline headline--small">Explore</h3>
                    <nav class="nav-list">
                        <!-- dynamic menu -->
                        <?php //wp_nav_menu(['theme_location'=>'footerMenu01']); ?>
                        <ul>
                            <li><a href="<?= site_url( '/about-us' ) ?>">About Us</a></li>
                            <li><a href="<?= site_url( '/programs' ) ?>">Programs</a></li>
                            <li><a href="<?= site_url( '/events' ) ?>">events</a></li>
                            <li><a href="<?= site_url( '/campuses' ) ?>">campuses</a></li>
                        </ul>
                    </nav>
                </div>

                <div class="site-footer__col-three">
                    <h3 class="headline headline--small">Learn</h3>
                    <nav class="nav-list">
                        <?php //wp_nav_menu(['theme_location'=>'footerMenu02']); ?>

                        <ul>
                            <li><a href="<?= site_url( '/Legal' ) ?>">Legal</a></li>
                            <li><a href="<?= site_url( '/privacy' ) ?>">Privacy</a></li>
                            <li><a href="<?= site_url( '/career' ) ?>">Career</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="site-footer__col-four">
                <h3 class="headline headline--small">Connect With Us</h3>
                <nav>
                    <ul class="min-list social-icons-list group">
                        <li>
                            <a href="#" class="social-color-facebook"><i class="fa fa-facebook"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-twitter"><i class="fa fa-twitter"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-youtube"><i class="fa fa-youtube"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-linkedin"><i class="fa fa-linkedin"
                                    aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="#" class="social-color-instagram"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>



<?php wp_footer(); ?>
</body>

</html>