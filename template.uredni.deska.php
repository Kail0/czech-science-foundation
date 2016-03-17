<?php
/*
 * Template Name: Uredni deska
 */
get_header(); ?>

			<div id="content" class="container clearfix">

				<!-- page header -->

				<!-- end page header -->


				<!-- content -->
				<div class="three-fourth">

					<h1><?php the_title(); ?> <?php if ( !get_post_meta($post->ID, 'snbpd_pagedesc', true)== '') { ?></h1><h5><?php }?><span><?php echo get_post_meta($post->ID, 'snbpd_pagedesc', true); ?></span></h5>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<div class="page-body clearfix">
								<!-- ACF -->
								<?php $uredni = new WP_Query(array(
									'post_type' => 'uredni_deska'
									)); ?>
									<?php while($uredni->have_posts()) : $uredni->the_post(); ?>
								<div class="col-md-12">
									<div class="panel">


													<h5><?php the_title(); ?> </h5>

													<span><?php the_field('datum_vyveseni'); ?>

														<?php the_field('datum_sejmuti'); ?></span>

										<?php if( get_field('stazeni') ):
										?><a href="<?php the_field('stazeni'); ?>" >Download File</a><?php
										endif;
										?>
									</div>
								</div>
							<?php endwhile; ?> <!-- end ACF-->
							</div> <!-- end article section -->

						<?php endwhile; ?>
					</article>

					<?php else : ?>

					<article id="post-not-found">
						<header>
							<h1><?php _e("Nenalezeno", "kailoframework"); ?></h1>
						</header>
						<section class="post_content">
							<p><?php _e("Omlouváme se, ale Vaše žádost zde nebyla nalezena", "kailoframework"); ?></p>
						</section>
						<footer>
						</footer>
					</article>

					<?php endif; ?>


				</div>




				<div class="one-fourth last">
					<?php get_template_part( 'page', 'sidebar' ); ?>
				</div>

			</div> <!-- end content -->

<?php get_footer(); ?>