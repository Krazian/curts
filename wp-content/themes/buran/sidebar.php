<?php
/**
 * The template for the sidebar containing the main widget area
 */
?>

<?php if ( is_active_sidebar( 'sidebar' )  ) : ?>
	<aside id="sidebar" class="sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside><!-- .sidebar .widget-area -->
<?php endif; ?>
