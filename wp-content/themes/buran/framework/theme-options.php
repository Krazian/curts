<?php

$theme = get_template_directory_uri();
$logo = $theme . '/framework/img/buran-logo.png';
if ( class_exists( 'Kirki' ) ) {
	Kirki::add_config( 'buran', array(
		'capability' => 'edit_theme_options',
		'option_type' => 'theme_mod',
	) );

	/***********************/
	/*HEADER
	/***********************/

	/*LOGO SETTINGS*/

	Kirki::add_field( 'buran', array(
		'type' => 'image',
		'settings' => 'logo',
		'label' => esc_attr__( 'Logo Upload', 'buran' ),
		'section' => 'title_tagline',
		'default' => $logo,
		'priority' => 1
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'switch',
		'settings' => 'logo_switch',
		'label' => esc_attr__( 'Show Site Title?', 'buran' ),
		'section' => 'title_tagline',
		'default' => '1',
		'priority' => 2,
		'choices' => array(
			'on' => esc_attr__( 'Yes', 'buran' ),
			'off' => esc_attr__( 'No', 'buran' ),
		),
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'text',
		'settings' => 'logo_size',
		'label' => esc_attr__( 'Logo Size', 'buran' ),
		'section' => 'title_tagline',
		'default' => '20',
		'priority' => 17,
		'output' => array(
			array(
				'element' => '.logo_holder img',
				'property' => 'width',
				'units'    => 'px',
			),
		),
	) );
	

	Kirki::add_field( 'buran', array(
		'type' => 'textarea',
		'settings' => 'copyright_text',
		'label' => esc_attr__( 'Copyright Text', 'buran' ),
		'section' => 'title_tagline',
		'default' => wp_kses_post( 'Copyright © 2014 - 2017. Design by <a href="https://themeforest.net/user/orangeidea">OrangeIdea</a>' ),
		'priority' => 17,
	) );
	
	
	/*MENU SETTINGS*/
	Kirki::add_section( 'general_settings', array(
		'title' => esc_attr__( 'General Settings', 'buran' ),
		'description' => esc_attr__( 'Menu Settings', 'buran' ),
		'priority' => 1,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'typography',
		'settings' => 'header_menu',
		'label' => esc_attr__( 'Menu Typography', 'buran' ),
		'section' => 'general_settings',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '400',
			'font-size' => '12px',
			'line-height' => '12px',
			'letter-spacing' => '0',
			'subsets' => array( 'latin-ext' ),
			'color' => false,
			'text-transform' => 'uppercase',
			'text-align' => false
		),
		'priority' => 3,
		'output' => array(
			array(
				'element' => 'ul.primary-menu >li> a',
			),
		),
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'multicolor',
		'settings' => 'header_menu_links',
		'label' => esc_attr__( 'Menu colors', 'buran' ),
		'section' => 'general_settings',
		'priority' => 4,
		'choices' => array(
			'link' => esc_attr__( 'Color', 'buran' ),
			'hover' => esc_attr__( 'Hover', 'buran' ),
			'active' => esc_attr__( 'Active', 'buran' ),
		),
		'default' => array(
			'link' => '#e83b23',
			'hover' => '#000000',
			'active' => '#000000',
		),
		'output' => array(
			array(
				'choice' => 'link',
				'element' => 'ul.primary-menu li > a',
				'property' => 'color',
			),
			array(
				'choice' => 'hover',
				'element' => 'ul.primary-menu li > a:hover, ul.primary-menu li:hover > a',
				'property' => 'color',
			),
			array(
				'choice' => 'active',
				'element' => 'ul.primary-menu li > a:active, ul.primary-menu li.current-menu-item > a, ul.primary-menu li.current-menu-parent > a,body:not(.single-portfolio) ul.primary-menu > li.current_page_parent > a,.primary-menu > li.current-menu-item > a, .primary-menu > li.current-menu-parent > a ',
				'property' => 'color',
			),
			array(
				'choice' => 'active',
				'element' => '.primary-menu > li.current-menu-item > a::before, .primary-menu > li.current-menu-parent > a::before, body:not(.single-portfolio) .primary-menu > li.current_page_parent > a::before',
				'property' => 'border-bottom-color',
			),
		),
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'color',
		'settings' => 'accent_color',
		'label' => esc_attr__( 'Accent Color', 'buran' ),
		'section' => 'general_settings',
		'default' => '#e83b23',
		'priority' => 10,
		'choices' => array(
			'alpha' => false,
		),
		'output' => array(
			array(
				'element' => 'a:hover, #middle-header h5, .show_on_map, .entry-footer a:hover, #copy a:hover',
				'property' => 'color',
			),
			array(
				'element' => 'input[type="submit"]:hover, .sticky.blog_article_holder',
				'property' => 'background-color',
				'value_pattern' => '$ !important'
			)
		)
	) );
	Kirki::add_field( 'buran', array(
		'type' => 'switch',
		'settings' => 'blog_layout',
		'label' => esc_attr__( 'Blog Sidebar', 'buran' ),
		'section' => 'general_settings',
		'default' => '1',
		'priority' => 10,
		'choices' => array(
			'on' => esc_attr__( 'Enable', 'buran' ),
			'off' => esc_attr__( 'Disable', 'buran' ),
		),
	) );

	/***********************/
	/*Typogaphy
	/***********************/
	Kirki::add_panel( 'typography', array(
		'priority' => 3,
		'title' => esc_html__( 'Typography', 'buran' ),
	) );
	/*GENERAL TYPOGRAPHY*/
	Kirki::add_section( 'general_typography', array(
		'title' => esc_attr__( 'General Typography', 'buran' ),
		'description' => esc_attr__( 'General Typography', 'buran' ),
		'panel' => 'typography', // Not typically needed.
		'priority' => 1,
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'typography',
		'settings' => 'general_typography_body',
		'label' => esc_attr__( 'Text Typography', 'buran' ),
		'section' => 'general_typography',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '400',
			'font-size' => '14px',
			'line-height' => '24px',
			'letter-spacing' => '0',
			'subsets' => array( 'latin-ext' ),
			'color' => '#777',
			'text-transform' => 'none',
			'text-align' => 'left'
		),
		'priority' => 10,
		'output' => array(
			array(
				'element' => 'body',
			),
		),
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'typography',
		'settings' => 'general_typography_h1',
		'label' => esc_attr__( 'H1 Heading', 'buran' ),
		'section' => 'general_typography',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '700',
			'font-size' => '34px',
			'line-height' => '1.3',
			'letter-spacing' => '0',
			'subsets' => array( 'latin-ext' ),
			'color' => '#000',
		),
		'priority' => 10,
		'output' => array(
			array(
				'element' => 'h1',
			),
		),
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'typography',
		'settings' => 'general_typography_h2',
		'label' => esc_attr__( 'H2 Heading', 'buran' ),
		'section' => 'general_typography',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '700',
			'font-size' => '28px',
			'line-height' => '1.3',
			'letter-spacing' => '0',
			'subsets' => array( 'latin-ext' ),
			'color' => '#000',
		),
		'priority' => 10,
		'output' => array(
			array(
				'element' => 'h2',
			),
		),
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'typography',
		'settings' => 'general_typography_h3',
		'label' => esc_attr__( 'H3 Heading', 'buran' ),
		'section' => 'general_typography',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '700',
			'font-size' => '24px',
			'line-height' => '1.3',
			'letter-spacing' => '0',
			'subsets' => array( 'latin-ext' ),
			'color' => '#000',
		),
		'priority' => 10,
		'output' => array(
			array(
				'element' => 'h3',
			),
		),
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'typography',
		'settings' => 'general_typography_h4',
		'label' => esc_attr__( 'H4 Heading', 'buran' ),
		'section' => 'general_typography',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '700',
			'font-size' => '18px',
			'line-height' => '1.3',
			'letter-spacing' => '0',
			'subsets' => array( 'latin-ext' ),
			'color' => '#000',
		),
		'priority' => 10,
		'output' => array(
			array(
				'element' => 'h4',
			),
		),
	) );


	Kirki::add_field( 'buran', array(
		'type' => 'typography',
		'settings' => 'general_typography_h5',
		'label' => esc_attr__( 'H5 Heading', 'buran' ),
		'section' => 'general_typography',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '700',
			'font-size' => '16px',
			'line-height' => '1.3',
			'letter-spacing' => '0',
			'subsets' => array( 'latin-ext' ),
			'color' => '#000',
		),
		'priority' => 10,
		'output' => array(
			array(
				'element' => 'h5',
			),
		),
	) );

	Kirki::add_field( 'buran', array(
		'type' => 'typography',
		'settings' => 'general_typography_h6',
		'label' => esc_attr__( 'H6 Heading', 'buran' ),
		'section' => 'general_typography',
		'default' => array(
			'font-family' => 'Roboto',
			'variant' => '700',
			'font-size' => '14px',
			'line-height' => '1.3',
			'letter-spacing' => '0',
			'subsets' => array( 'latin-ext' ),
			'color' => '#000',
		),
		'priority' => 10,
		'output' => array(
			array(
				'element' => 'h6',
			),
		),
	) );

	/*SHOP SETTINGS*/
	Kirki::add_section( 'shop_settings', array(
		'title' => esc_attr__( 'Shop Settings', 'buran' ),
		'description' => esc_attr__( 'Shop Settings', 'buran' ),
		'priority' => 1,
		'capability' => 'edit_theme_options',
	) );
	
	
	Kirki::add_field( 'buran', array(
		'type'        => 'slider',
		'settings'    => 'prodocts_per_page',
		'label'       => esc_attr__( 'Products per page', 'buran' ),
		'section'     => 'shop_settings',
		'default'     => 12,
		'choices'     => array(
			'min'  => '2',
			'max'  => '100',
			'step' => '1',
		),
	) );
	
	
	Kirki::add_field( 'buran', array(
		'type'        => 'select',
		'settings'    => 'prodocts_per_row',
		'label'       => __( 'Products per row', 'buran' ),
		'section'     => 'shop_settings',
		'default'     => 'products_per_row_3',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => array(
			'products_per_row_4' => esc_attr__( '4 Products', 'buran' ),
			'products_per_row_3' => esc_attr__( '3 Products', 'buran' ),
			'products_per_row_2' => esc_attr__( '2 Products', 'buran' ),
		),
	) );
	
	Kirki::add_field( 'buran', array(
		'type'        => 'select',
		'settings'    => 'prodocts_sidebar',
		'label'       => __( 'Show Sidebar?', 'buran' ),
		'section'     => 'shop_settings',
		'default'     => 'no',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => array(
			'yes' => esc_attr__( 'Yes', 'buran' ),
			'no' => esc_attr__( 'No', 'buran' ),
		),
	) );
	
	
	Kirki::add_field( 'buran', array(
		'type' => 'color',
		'settings' => 'accent_woo_color',
		'label' => esc_attr__( 'Accent Color', 'buran' ),
		'section' => 'shop_settings',
		'default' => '#e83b23',
		'priority' => 10,
		'choices' => array(
			'alpha' => false,
		),
		'output' => array(
			array(
				'element' => '.woocommerce ul.products li.product .price ins, .woocommerce #oi_blog_sb ins .amount, .woocommerce .star-rating span::before, .woocommerce #oi_blog_sb ins .amount, .woocommerce-variation-price .amount, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce p.stars a',
				'property' => 'color',
			),
			array(
				'element' => '.woocommerce span.onsale, .price_label, .shop_cart_full',
				'property' => 'background',
			),
			array(
				'element' => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a',
				'property' => 'border-bottom-color',
			),
			
			
		)
	) );
	

}
?>