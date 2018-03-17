<?php
get_header(); ?>
<div class="row page_for_blog">
    <div class="col-md-12">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php if ( have_posts() ) : ?>
                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                      
                        get_template_part( 'framework/template-parts/content', get_post_format() );
        
                    // End the loop.
                    endwhile;
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                        'prev_text'          => esc_attr__( 'Previous', 'buran' ),
                        'next_text'          => esc_attr__( 'Next', 'buran' ),
                        'screen_reader_text' => esc_attr__( 'Choose Page', 'buran' )
                    ) );
        
                // If no content, include the "No posts found" template.
                else :
                    get_template_part( 'framework/template-parts/content', 'none' );
        
                endif;
                ?>
            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div>
   
</div>
<?php get_footer(); ?>
