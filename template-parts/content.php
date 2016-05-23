<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gacr
 */

?>
<!-- If is post page single, show pictures of header, if not, show regular card with not images -->
<?php if ( !is_single() && is_front_page() && !wp_is_mobile() ) { ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                            <header class="entry-header CONTENT">
                                <?php
                                    //if is single post add H1, otherwise add H2
                                    if ( is_single() ) {
                                        the_title( '<h1 class="entry-title">', '</h1>' );
                                    } else {
                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                    }

                                if ( 'post' === get_post_type() ) : ?>
                                <div class="entry-meta">
                                    <?php gacr_posted_on(); ?>
                                </div><!-- .entry-meta -->
                                <?php
                                endif; ?>
                            </header><!-- .entry-header -->
                        </span>
                <div class="entry-content">
                    <?php
                        the_content( sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gacr' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gacr' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
                </div> <!-- card content -->
                <div class="card-action">
                    <footer class="entry-footer">
                        <a href="<?php esc_url( the_permalink() ); ?>" class="white btn-floating waves-effect waves-circle z-depth-0">
                            <?php printf( esc_html( '%s', 'gacr' ), '<i class="material-icons gacr-blue-text">&#xE5C8;</i>' ); ?>
                        </a>
                    </footer><!-- .entry-footer -->
                </div>
            </div><!-- card -->
        </article><!-- #post-## -->

<?php } elseif ( is_single() ) { ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="card">
        <?php if (has_post_thumbnail()) { ?>
            <div class="card-image">
                <?php the_post_thumbnail('card-header');?>
                <span class="card-title">
                    <header class="entry-header CONTENT">
                        <?php
                            if ( is_single() ) {
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            } else {
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            }

                        if ( 'post' === get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php gacr_posted_on(); ?>
                        </div><!-- .entry-meta -->
                        <?php
                        endif; ?>
                    </header><!-- .entry-header -->
                </span>
            </div>
        <div class="card-content">
        <?php } else { ?>
        <div class="card-content">
            <span class="card-title">
                    <header class="entry-header CONTENT">
                        <?php
                            if ( is_single() ) {
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            } else {
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            }

                        if ( 'post' === get_post_type() ) : ?>
                        <div class="entry-meta">
                            <?php gacr_posted_on(); ?>
                        </div><!-- .entry-meta -->
                        <?php
                        endif; ?>
                    </header><!-- .entry-header -->
                </span>
        <?php } ?>
        <div class="entry-content">
            <?php
                the_content( sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gacr' ), array( 'span' => array( 'class' => array() ) ) ),
                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                ) );

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gacr' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
        </div> <!-- card content -->
            <div class="card-action">
                <footer class="entry-footer">
                    <?php gacr_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </div>

        </div><!--  card -->
    </article><!-- #post-## -->

<?php } elseif ( is_front_page() && wp_is_mobile() ) { ?>

<div data-animation="animate">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                            <header class="entry-header CONTENT">
                                <?php
                                    //if is single post add H1, otherwise add H2
                                    if ( is_single() ) {
                                        the_title( '<h1 class="entry-title">', '</h1>' );
                                    } else {
                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                    }

                                if ( 'post' === get_post_type() ) : ?>
                                <div class="entry-meta">
                                    <?php gacr_posted_on(); ?>
                                </div><!-- .entry-meta -->
                                <?php
                                endif; ?>
                            </header><!-- .entry-header -->
                        </span>
                <div class="entry-content">
                    <?php
                        the_content( sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'gacr' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gacr' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
                </div> <!-- card content -->
                <div class="card-action">
                    <footer class="entry-footer">
                        <a href="<?php esc_url( the_permalink() ); ?>" class="white btn-floating waves-effect waves-circle z-depth-0">
                            <?php printf( esc_html( '%s', 'gacr' ), '<i class="material-icons gacr-blue-text">&#xE5C8;</i>' ); ?>
                        </a>
                    </footer><!-- .entry-footer -->
                </div>

            </div><!-- card -->
        </article><!-- #post-## -->
 </div>
<?php } ?>