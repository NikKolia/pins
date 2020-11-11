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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<section class="navbar">
    <div class="container">
        <div class="navbar-block">
            <div class="navbar-logo">
			<a href="<?php echo home_url(); ?>">
                <img class="logo-img" src="<?php echo $redux_demo['logo'] ['url']; ?>" alt="Логотип pins" ></a>
                <span class="logo-text">Школа<br>Шитья</span>
                         </div>
                <div class="navbar-nav">
					<nav>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'header',
						'container'        => false,
						'menu_class'	 => 'navbar-menu-head',
						'container_class' => 'navbar-menu-head',
					) );
					?>
					</nav>
                </div>
                    <div class="navbar-right">
                        <a href="#" id="icon-notif"></a>
                        <a href="#" id="icon-account"></a>
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
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l">
						<span class="topbar-child1">
                            <a class="topbar-child1" href="tel:<?php echo $redux_demo['phone']; ?>"><?php echo $redux_demo['phone']; ?></a>
						</span>
					</li>

					<li class="item-topbar-mobile p-l">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								<a class="topbar-email" href="mailto:<?php echo $redux_demo['email']; ?>"><?php echo $redux_demo['email']; ?></a>
							</span>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fab fa-facebook-f"></a>
							<a href="#" class="topbar-social-item fab fa-instagram"></a>
							<a href="#" class="topbar-social-item fab fa-youtube"></a>
						</div>
					</li>
				<?php
					wp_nav_menu( array(
						'theme_location' => 'mobile',
						'container'        => false,
						'menu_class'	 => 'wrap-side-menu',
						'container_class' => 'wrap-side-menu',
					) );
					?>
					<li class="item-menu-mobile">
						<a href="index.html">Home</a>
						<ul class="sub-menu">
							<li><a href="index.html">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="cart.html">Features</a>
					</li>

					<li class="item-menu-mobile">
						<a href="blog.html">Blog</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>

	
	</header><!-- #masthead -->