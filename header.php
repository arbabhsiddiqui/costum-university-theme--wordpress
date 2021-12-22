<!DOCTYPE html>
<html <?= language_attributes(); ?>>

<head>
    <meta charset="<?= bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?= body_class(); ?>>
    <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left">
                <a href="<?= site_url() ?>"><strong>Fictional</strong> University</a>
            </h1>
            <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search"
                    aria-hidden="true"></i></span>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
            <div class="site-header__menu group">
                <nav class="main-navigation">
                    <?php //wp_nav_menu(['theme_location'=>'headerMenu']); ?>
                    <ul>
                        <li
                            <?php if(is_page('about-us')||wp_get_post_parent_id(0) ==5 ) echo ' class="current-menu-item"' ?>>
                            <a href="<?= site_url( '/about-us' ) ?>">About Us</a>
                        </li>
                        <li
                            <?php if(is_page('programs')||wp_get_post_parent_id(0)==6) echo ' class="current-menu-item"' ?>>
                            <a href="<?= site_url( '/programs' ) ?>">Programs</a>
                        </li>
                        <li
                            <?php if(get_post_type()== "event" || is_page('past-events') ) echo ' class="current-menu-item"' ?>>
                            <a href="<?=  get_post_type_archive_link('event');?>">events</a>
                        </li>
                        <li
                            <?php if(is_page('campuses')||wp_get_post_parent_id(0)==3) echo ' class="current-menu-item"' ?>>
                            <a href="<?= site_url( '/campuses' ) ?>">campuses</a>
                        </li>
                        <li <?php if(get_post_type()== "post") echo 'class="current-menu-item"' ?>>
                            <a href="<?= site_url( '/blog' ) ?>">blog</a>
                        </li>
                    </ul>
                </nav>
                <div class="site-header__util">
                    <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                    <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                    <span class="search-trigger js-search-trigger"><i class="fa fa-search"
                            aria-hidden="true"></i></span>
                </div>
            </div>
        </div>
    </header>