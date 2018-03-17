<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 */
?>
</div> <!-- End of #main-area -->
<footer>
	<div class="d-lg-flex d-md-flex d-sm-block flex-row align-items-center justify-content-between">
		<div class="copy">
			<?php echo do_shortcode(wp_kses_post(get_theme_mod( 'copyright_text', 'Copyright © 2017. Design by <a href="https://themeforest.net/user/orangeidea">OrangeIdea</a>')));?>
		</div>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav id="social-navigation" class="social-navigation" aria-label="<?php esc_attr_e( 'Social Menu', 'buran' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'social',
				'menu_class' => 'social-menu',
				'depth' => 1
			) );
			?>
		</nav>
		<!-- .social-navigation -->
		<?php endif; ?>
	</div>
</footer>
</div> <!-- End of #middle-side -->

</div> <!-- End of #site -->
<?php wp_footer(); ?>
</body>
</html>