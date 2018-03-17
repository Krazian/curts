<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */

get_header(); ?>
<?php 
$sidebar = 0;
if(isset($_GET['sidebar'])){
	if($_GET['sidebar'] == 1){
		$sidebar = 1;
	}
}
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    	<div class="woo_container">
    	<?php if(get_theme_mod( 'prodocts_sidebar','no') =='no' && $sidebar == 0 ){ woocommerce_content(); }else{?>
    		<div id="shop_area">
				<div class="woo_area">
					<div class="row">
						<div class="col-md-12">
							<?php woocommerce_content();?>
						</div>
					</div>
				</div>
				<div class="sidebar_area">
					<div id="oi_blog_sb">
						<?php dynamic_sidebar('shop sidebar'); ?>
					</div>
				</div>
			</div>
		<?php } ?>
        </div>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php get_footer(); ?>
