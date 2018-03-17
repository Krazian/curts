<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>

<section class="no-results not-found  text-center">
	

	<div class="page-content_nothing">

<header>
		<h1 class="page-title nothing_found"><?php esc_html_e( 'Nothing Found', 'buran' ); ?></h1>
	</header><!-- .page-header -->
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			
			<h4 class="text-center"><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'buran' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h4>

		<?php elseif ( is_search() ) : ?>
			<div class="container">
                <h5><?php esc_attr_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'buran' ); ?></h5>
                <div class="col-md-4 col-md-push-4"><br><?php get_search_form(); ?></div>
            </div>

		<?php else : ?>
		<div class="widget">
			<h4><?php esc_attr_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'buran' ); ?></h4>
			<div class="col-md-4 col-md-push-4"><br><?php get_search_form(); ?></div>
            </div>
		<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
