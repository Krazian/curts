<?php
/**
 * The template part for displaying single posts
 */
?>
<article  id="post-<?php the_ID(); ?>">
	<div class="entry-content">
		<h1 class="simple_page_title"><?php the_title();?></h1>
		<br>
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'buran' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '%',
				'separator'   => '',
			) );
		?>
	</div><!-- .entry-content -->
	
	<div class="entry-footer">
		<?php buran_entry_taxonomies('categories, tags')?>
	</div><!-- .entry-footer -->
</article><!-- #post-## -->
