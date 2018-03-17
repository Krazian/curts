<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header();  $blog_layout = get_theme_mod( 'blog_layout', '1' );?>
<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
<?php if( isset($_GET['sb']) && ($_GET['sb'] == '1')) {$blog_layout = '1';}?>
<div class="container_single_post">

<div class="d-lg-flex d-md-block flex-row">
   <div class="<?php if( ($blog_layout == '1') && (is_active_sidebar( 'sidebar' ))){ echo 'col-lg-8 col-md-12 with_sidebar_article';}else{echo 'col-lg-12';}?>">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
            <?php if($feat_image){?><img class="featured_image" alt="" src="<?php  echo esc_url($feat_image);?>"><?php } ?>
                <?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'framework/template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'buran' ),
				) );
			} 

			// End of the loop.
		endwhile;
		?>
            </main><!-- .site-main -->
        </div><!-- .content-area -->
    </div>
     <?php if( ($blog_layout == '1') && (is_active_sidebar( 'sidebar' ))){?> 
    <div class="col-lg-4 col-md-12" id="oi_blog_sb">
        <?php dynamic_sidebar('sidebar'); ?>
    </div>
    <?php } ?>
</div>
</div>
<?php get_footer(); ?>

