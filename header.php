<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gacr
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gacr' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="container z-depth-1 white">
			<div class="row">
				<div class="col l12">
					<div class="site-branding">
						<?php
						if ( is_front_page() && is_home() ) : ?>
							<h1 class="logo">
								<a href="<?php echo esc_url( home_url( '/' ), 'gacr' ) ; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/GACR-CZ_logo.png' ); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
								</a>
							</h1>
						<?php else : ?>
							<p class="logo">
								<a href="<?php echo esc_url( home_url( '/' ), 'gacr' ) ; ?>" id="logo-container" class="brand-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/GACR-CZ_logo.png' ); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
								</a>
							</p>
						<?php
						endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php
						endif; ?>
					</div><!-- .site-branding -->
				</div>
			</div>

			<div class="m-container nav">
				<nav id="site-navigation" class="placeholder" role="navigation">
					<div class="morph-main-menu-button-wrapper">
						<a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
					</div>
					<div class="nav-wrapper">

						<?php wp_nav_menu( array(
							'theme_location' => 'Drawer',
							'menu_class' => 'menu side-nav',
							'menu_id' => 'mobile-nav',
							'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="mobile-header"><p>Menu</p></li>%3$s</ul><div class="clear"></div>'
							)); ?>

						<?php wp_nav_menu( array(
							'menu' => 'Primary',
							'theme_location'=>'Primary',
							'menu_class' => 'hide-on-med-and-down',
							'walker' => new wp_materialize_navwalker()
							)); ?>
					</div>
				</nav><!-- #site-navigation -->
				<div class="clear"></div>
			</div>
		</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">