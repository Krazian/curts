<?php
/**
 * Custom template tags
 * Eventually, some of the functionality here could be replaced by core features.
 */

/**
 * Excerpt Length
 */

function buran_excerpt_length( $length ) {
  return 40;
}

add_filter( 'excerpt_length', 'buran_excerpt_length', 999 );

function buran_add_p_tag($link){
return "<div class='blogger-more-holder'>$link</div>";
}
add_filter('the_content_more_link', 'buran_add_p_tag');



/*Responsive Video*/
add_filter( 'embed_oembed_html', 'buran_oembed_filter', 10, 4 ) ;

function buran_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}


if ( ! function_exists( 'buran_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 *
 * Create your own buran_entry_meta() function to override in a child theme.
 *
 */
function buran_entry_meta($show) {
	if (strpos($show, 'author') !== false) {
		if ( 'post' === get_post_type() ) {
			printf( '<span class="byline"><span class="author vcard">%1$s<a class="url fn n" href="%2$s">%3$s</a></span></span>',
				_x( '', 'Used before post author name.', 'buran' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}
	}

	if (strpos($show, 'date') !== false) {
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			buran_entry_date();
		}
	}

	if (strpos($show, 'comments') !== false) {
		if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( sprintf( esc_attr__( 'Leave a comment', 'buran' ), get_the_title() ) );
			echo '</span>';
		}
	}
}
endif;


if ( ! function_exists( 'buran_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own buran_entry_date() function to override in a child theme.
 *
 */
function buran_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';



	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( '', 'Used before publish date.', 'buran' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'buran_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own buran_entry_taxonomies() function to override in a child theme.
 *
 */
function buran_entry_taxonomies($show) {
	if (strpos($show, 'categories') !== false) {
		$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'buran' ) );
		if ( $categories_list && buran_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Category: ', 'Used before category names.', 'buran' ),
				$categories_list
			);
		}
	}
	
	if (strpos($show, 'tags') !== false) {
		$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'buran' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				_x( 'Tags: ', 'Used before tag names.', 'buran' ),
				$tags_list
			);
		}
	}

}
endif;

if ( ! function_exists( 'buran_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own buran_post_thumbnail() function to override in a child theme.
 *
 */
function buran_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'buran_owl_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own buran_post_thumbnail() function to override in a child theme.
 */
function buran_owl_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}?>
    
		<div class="blogger_gallery_slider owl-carousel">
			<?php
            $arr = explode(",", get_post_meta( get_the_ID(), 'image', true));
            foreach ($arr as $value) {
                $img = wp_get_attachment_image_src( $value, 'blog-normal' );
            ?>
                <div>
                <img src="<?php echo esc_url($img[0])?>" alt="<?php the_title(); ?>" alt="<?php echo  get_the_title( get_the_ID() )?>" /></a>
                </div>
            <?php }; ?>
        </div>

    <?php
	
}
endif;




if ( ! function_exists( 'buran_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own buran_excerpt() function to override in a child theme.
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function buran_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );
		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class;//escaped in line 204 ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class;//escaped in line 204 ?> -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'buran_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own buran_excerpt_more() function to override in a child theme.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function buran_excerpt_more() {
	$link = sprintf( '<div class="blogger-more-holder"><a href="%1$s" class="more-link">%2$s</a></div>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( esc_attr__( 'Continue reading', 'buran' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'buran_excerpt_more' );
endif;

/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own buran_categorized_blog() function to override in a child theme.
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function buran_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'buran_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'buran_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so buran_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so buran_categorized_blog should return false.
		return false;
	}
}

/**
 * Flushes out the transients used in buran_categorized_blog().
 *
 */
function buran_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'buran_categories' );
}
add_action( 'edit_category', 'buran_category_transient_flusher' );
add_action( 'save_post',     'buran_category_transient_flusher' );

if ( ! function_exists( 'buran_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function buran_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

function buran_is_blog() {
    return ( is_author() || is_category() || is_tag() || is_date() || is_home() || is_single() ) && 'post' == get_post_type();
}


function buran_fix_blog_link_on_cpt( $classes, $item, $args ) {
	if( !buran_is_blog() ) {
		$blog_page_id = intval( get_option('page_for_posts') );
		if( $blog_page_id != 0 && $item->object_id == $blog_page_id )
			unset($classes[array_search('current_page_parent', $classes)]);
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'buran_fix_blog_link_on_cpt', 10, 3 );



