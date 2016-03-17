<?php
/*
 * Template Name: GACR event
 */
get_header(); ?>

<div class="container clearfix">
	<!-- content -->
	<div class="row">
    	<div class="col s12">
    		<h1><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?></h1>
            <h5><?php }?><span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h5>
    			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
    				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    					<div class="page-body clearfix">

    					</div> <!-- end article section -->

    				<?php endwhile; ?>
    			</article>
    					<?php endif; ?>
            <?php wp_nav_menu(
    array(
    'menu' => '68',
    'menu_class' => 'side-nav',
    'menu_id' => 'slide-out',
    'walker' => new themeslug_walker_nav_menu
  )
);
?>
    	</div> <!-- end col 12 -->
    </div> <!-- row -->
</div> <!-- end container -->

<?php get_footer(); ?>