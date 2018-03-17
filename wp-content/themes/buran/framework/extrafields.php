<?php
/* ------------------------------------------------------------------------ */
/* Extra Fields.  */
/* ------------------------------------------------------------------------ */
add_action('admin_init', 'buran_extra_fields', 1);
function buran_extra_fields() {
	add_meta_box( 'buran_pages', esc_attr__( 'Page Settings', 'buran' ), 'buran_page_sidebar_callback', 'page','side' );
	add_meta_box( 'buran_posts', esc_attr__( 'Post Settings', 'buran' ), 'buran_post_sidebar_callback', 'post','side' );
}

function buran_page_sidebar_callback($post){ ?>
<h4><?php esc_attr_e('Show page title?','buran')?></h4>
<select name="extra[page_title]">
     <option value="<?php esc_attr_e('Yes','buran') ?>" <?php selected( get_post_meta($post->ID, 'page_title', 1), esc_attr__('Yes','buran') ); ?>><?php esc_attr_e('Yes','buran') ?></option>
     <option value="<?php esc_attr_e('No','buran') ?>" <?php selected( get_post_meta($post->ID, 'page_title', 1), esc_attr__('No','buran') ); ?>><?php esc_attr_e('No','buran') ?></option>
</select>
<?php }


function buran_post_sidebar_callback($post){ ?>
<h4><?php esc_attr_e('Post Highlight in Listing','buran')?></h4>
<select name="extra[post_layout]">
     <option value="<?php esc_attr_e('standard','buran') ?>" <?php selected( get_post_meta($post->ID, 'post_layout', 1), esc_attr__('standard','buran') ); ?>><?php esc_attr_e('standard','buran') ?></option>
     <option value="<?php esc_attr_e('highlighted','buran') ?>" <?php selected( get_post_meta($post->ID, 'post_layout', 1), esc_attr__('highlighted','buran') ); ?>><?php esc_attr_e('highlighted','buran') ?></option>
</select>
<?php }
//Save Extra Fields
add_action('save_post', 'buran_fields_update', 0);
function buran_fields_update( $post_id ){
	
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; 
	if ( !current_user_can('edit_post', $post_id) ) return false; 
	if( !isset($_POST['extra']) ) return false;	

	
	$_POST['extra'] = array_map('trim', $_POST['extra']);
	foreach( $_POST['extra'] as $key=>$value ){
		if( empty($value) )	delete_post_meta($post_id, $key);
		update_post_meta($post_id, $key, $value);
	}
	return $post_id;
}
