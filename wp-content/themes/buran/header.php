<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site" div.
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<div id="header">
<div class="menu_overlay"></div>
	<div class="container">
		<div class="d-flex flex-row align-items-center justify-content-between">
			<div class="logo_holder">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="d-flex logo align-items-center justify-content-between">
					<img class="logo" src="<?php echo get_theme_mod( 'logo', get_template_directory_uri() .'/framework/img/buran-logo.png' ); ?>" alt="<?php echo esc_attr(bloginfo('name'));?>" />
					<?php if(get_theme_mod( 'logo_switch', 1)){?>
					<h3 class="logo_decription" style=""><?php echo esc_attr(bloginfo('name'));?></h3>
					<?php }?>
				</a>
			</div>
            <div class="flex-item d-md-none d-sm-block">
				<a id="open_mobile_menu" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
			</div>
			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'buran' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
							'depth' => 2
						 ) );
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>
		</div>
	</div>
</div>
<div id="site" class="container">
<div class="middle-side">
	<div id="main-area">