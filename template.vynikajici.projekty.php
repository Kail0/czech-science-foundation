<?php
/*
 * Template Name: VYNIKAJICI PROJEKTY
*/
get_header(); ?>

<div id="primary" class="container clearfix" role="main">

        <!-- page header -->

        <!-- end page header -->

        <!-- content -->
        <div class="section">
            <div class="row">
                <div class="col s9 right">
                <!-- TICKER -->
                    <div class="eventTicker z-depth-1" id="ticker">
                        <div class="bn-title"><h5>Důležité termíny</h5><span></span></div>
                        <?php
                            // args
                            $args = array(
                                        'post_type' => 'gacr-event',
                                        'posts_per_page'  => 5,
                                        'orderby'         => 'meta_value_num',
                                        'order'           => 'ASC',
                                        'meta_query' => array(
                                            array(
                                                    'key' => 'date',
                                                    'type' => 'NUMERIC', // MySQL needs to treat date meta values as numbers
                                                    'value' => current_time( 'Ymd' ), // Today in ACF datetime format
                                                    'compare' => '>=', // Greater than or equal to value
                                                ),
                                            ),
                                        );
                        // query
                        $event = new WP_Query( $args );
                        ?>
                        <?php if( $event->have_posts() ): ?>
                            <ul>
                            <?php while( $event->have_posts() ) : $event->the_post(); ?>
                                <li class="gacr-event">
                                    <?php $date = get_field('date');
                                          $date2 = date("j F, Y", strtotime($date));
                                    ?>
                                    <span class="date"><?php echo $date2; ?>&nbsp;|</span>
                                    <span><a href="#"><?php the_title(); ?></a></span>
                                </li>
                            <?php endwhile; ?>
                            </ul>
                            <div class="bn-navi">
                                <span class="arrow aleft"></span>
                                <span class="arrow aright"></span>
                            </div>
                            <?php else : ?>
                                <ul>
                                    <li class="gacr-event"><?php _e( 'V nejbližší době nejsou pro řešitele a žadatele žádné důležité termíny.' ); ?></li>
                                </ul>
                            <?php endif; ?>

                        <?php wp_reset_postdata();  // Restore global post data stomped by the_post(). ?>
                    </div><!-- END TICKER -->

                </div>

                <div id="secondary" class="widget-area col l3 s12" role="complementary">
                    <?php get_template_part( 'page', 'sidebar' ); ?>
                </div>
            </div>
        </div>
    </div> <!-- end content -->

<?php get_footer(); ?>