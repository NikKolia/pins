<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pins-theme
 */

global $redux_demo;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v8.0" nonce="qnuT4LE7"></script>
<section class="navbar">
    <div class="container">
        <div class="navbar-block">
            <div class="navbar-logo">
                <a href="<?php echo home_url(); ?>">
                    <img class="logo-img" src="<?php echo $redux_demo['logo'] ['url']; ?>" alt="Логотип pins"></a>
                <span class="logo-text">Школа<p>Шитья</p></span>
            </div>
            <div class="navbar-nav">
                <nav>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header',
                        'container' => false,
                        'menu_class' => 'navbar-menu-head',
                        'container_class' => 'navbar-menu-head',

                    ));
                    ?>
                </nav>
            </div>
            <div class="navbar-right">
                <!-- <a href="#" id="icon-notif"></a>
                <a href="#" id="icon-account"></a> -->
                <div class="btn-show-menu-mobile hamburger hamburger--squeeze s">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Header Mobile -->

<!-- Menu Mobile -->
<div class="wrap-side-menu">
    <div class="side-menu">
        <ul class="main-menu">

            <?php
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'container' => 'nav',
                'menu_class' => 'main-menu',
                'container_class' => 'side-menu'

            ));
            ?>

            <li class="item-topbar-mobile p-l">
						<span class="topbar-child1">
                            <a class="topbar-child1"
                               href="tel:<?php echo $redux_demo['phone']; ?>"><?php echo $redux_demo['phone']; ?></a>
						</span>
            </li>

            <li class="item-topbar-mobile p-l">
                <div class="topbar-child2-mobile">
							<span class="topbar-email">
								<a class="topbar-email"
                                   href="mailto:<?php echo $redux_demo['email']; ?>"><?php echo $redux_demo['email']; ?></a>
							</span>
                </div>
            </li>

            <li class="item-topbar-mobile p-l-10">
                <div class="topbar-social-mobile">
                    <a href="<?php echo $redux_demo['social']['Facebook']; ?>"
                       class="topbar-social-item fab fa-facebook-f"></a>
                    <a href="<?php echo $redux_demo['social']['Instagram']; ?>"
                       class="topbar-social-item fab fa-instagram"></a>
                    <a href="<?php echo $redux_demo['social']['Youtube']; ?>"
                       class="topbar-social-item fab fa-youtube"></a>
                </div>
            </li>
    </div>
</div>


</header><!-- #masthead -->