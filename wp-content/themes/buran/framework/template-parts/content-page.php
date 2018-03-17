<?php
/**
 * The template used for displaying page content
 */
?>
<article id="post-<?php the_ID(); ?>">
    <div class="container-page">
        <div class="entry-content">
			<?php if(get_post_meta($post->ID, 'page_title', 1) !="No"){ ?><h1 class="simple_page_title"><?php the_title();?></h1><?php }?>
            <?php the_content();  ?>
        </div>
    </div>
</article>
