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
		<div class="container z-depth-1">
			<div class="site-branding">
				<?php
				if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ), 'gacr' ) ; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() . '/img/GACR-CZ_logo.png' ); ?>" alt="<?php echo bloginfo( 'name' ) ?>" />
						</a>
					</h1>
				<?php else : ?>
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ), 'gacr' ) ; ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
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

			<div class="m-container nav">
				<nav id="site-navigation" class="placeholder" role="navigation">
					<div class="morph-main-menu-button-wrapper">
						<a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a>
					</div>
					<div class="nav-wrapper">

						<?php wp_nav_menu( array(
							'theme_location' => 'drawer',
							'menu_class' => 'menu side-nav',
							'menu_id' => 'mobile-nav',
							'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="mobile-header"><p>Menu</p></li>%3$s</ul><div class="clear"></div>'
							)); ?>

						<?php wp_nav_menu( array(
							'theme_location'=>'primary',
							'menu_class' => 'hide-on-med-and-down',
							'walker' => new Materialize_CSS_Menu_Walker()
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

			<!-- TEST MENU, DELETE AFTEWARDS-->
			<!-- <nav id="site-navigation" class="placeholder" role="navigation">
    <div class="nav-wrapper">
        <div class="menu-main-container">
            <ul id="menu-main" class="hide-on-med-and-down">
                <li id="nav-menu-item-18821" class="main-menu-item  menu-item-even menu-item-depth-0"><a href="http://web-test.gacr.cz/o-ga-cr/o-nas/" class="dropdown-button" data-activates="dropdown-18821">NESTED1<i class="material-icons right">arrow_drop_down</i></a>
                    <ul id="dropdown-18821" class="dropdown-content menu-odd  menu-depth-1" style="white-space: nowrap; position: absolute; top: 64px; left: 0px; opacity: 1; display: none;">
                        <li id="nav-menu-item-18822" class="sub-menu-item  menu-item-odd menu-item-depth-1"><a href="http://web-test.gacr.cz/o-ga-cr/">O GA ČR</a></li>
                        <li id="nav-menu-item-18887" class="sub-menu-item  menu-item-odd menu-item-depth-1"><a href="http://web-test.gacr.cz/faq/riv/">RIV</a></li>
                        <li id="nav-menu-item-18888" class="sub-menu-item  menu-item-odd menu-item-depth-1"><a href="http://web-test.gacr.cz/faq/soutez-excelence/" class="dropdown-button" data-activates="dropdown-18888">Soutěž – Excelence<i class="material-icons right">arrow_drop_down</i></a>
                            <ul class="collapsible collapsible-accordion">
    <li class="bold"><a class="collapsible-header  waves-effect waves-teal">CSS</a>
        <div class="collapsible-body" style="">
            <ul>
                <li><a href="color.html">Color</a></li>
                <li><a href="grid.html">Grid</a></li>
                <li><a href="helpers.html">Helpers</a></li>
                <li><a href="media-css.html">Media</a></li>
                <li><a href="sass.html">Sass</a></li>
                <li><a href="shadow.html">Shadow</a></li>
                <li><a href="table.html">Table</a></li>
                <li><a href="typography.html">Typography</a></li>
            </ul>
        </div>
    </li>
</ul>

a
                        </li>
                        <li id="nav-menu-item-18830" class="sub-menu-item  menu-item-odd menu-item-depth-1"><a href="http://web-test.gacr.cz/vyznamne-vysledky/">Významné výsledky</a></li>
                        <li id="nav-menu-item-19021" class="sub-menu-item  menu-item-odd menu-item-depth-1"><a href="http://web-test.gacr.cz/podani-zz/">Podat závěrečnou zprávu</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav> -->

