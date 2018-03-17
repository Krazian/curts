<?php
/**
 * The template part for displaying content
 */
?>
<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
<?php
$extra = 'blog_article_holder';
if(get_post_meta($post->ID, 'post_layout', 1)){
$extra .= ' '.get_post_meta($post->ID, 'post_layout', 1);
}
$category = get_the_category();

?>
<div id="post-<?php the_ID(); ?>" <?php post_class($extra); ?>>
<a class="main_blog_a" href="<?php echo esc_url( get_permalink())?>">
<div class="blogpost_image_holder" style="background-image:url('<?php  echo esc_url($feat_image);?>')">
</div>
<article>
        <?php if($feat_image !=''){?>
        <div>
        <?php }else{echo '<div class="no_feat_image">';}?>
            <div class="entry-header">
            	
                <div class="oi_date"><h6><?php if($category){echo get_the_date();}else{esc_attr_e('Page ','buran');}; ?></h6></div>
                <h3 class="entry-title"><?php the_title(); ?></h3>
                <div class="enty-meta">
                 <?php if($category){$i = 1; esc_attr_e('Category: ','buran'); foreach ($category as $cat){
				echo esc_attr($cat->cat_name).' '; if ($i++ == 12) break;
				}}?>
                </div>
            </div><!-- .entry-header -->
        </div>
</article><!-- #post-## -->
</a>
</div>