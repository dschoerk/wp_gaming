<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
    }
}

// show_admin_bar(false);

// post view counts
function count_post_views() {
	if (is_single()) {
		global $post;
		$post_id = $post->ID;
		$count = 1;
		$post_view_count = get_post_meta($post_id, 'views_count', true);
		if ($post_view_count) {
			$count = $post_view_count + 1;
		}

		update_post_meta($post_id, 'views_count', $count);
	}
}

add_action('wp_head', 'count_post_views');
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_post_type_support('forum', array('thumbnail'));

// TODO: refactor table names, check if plugins are active
function bbp_get_likes_for_user($userid) 
{
	global $wpdb;
	$likes = $wpdb->get_var("SELECT COUNT(*) FROM wp_posts p JOIN wp_ulike_forums wuf ON p.ID=wuf.topic_id AND p.post_author = " . $userid);
	return $likes;
}

// enable tinymce for bbpress
function bbp_enable_visual_editor( $args = array() ) {
    $args['tinymce'] = true;
    $args['teeny'] = false;
    return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );

// colored roles
//add_filter('bbp_get_topic_author_link', 'bbp_get_topic_author_link_hook', 10, 2 );
function bbp_get_topic_author_link_hook($author_link, $args) {

	//$role = strtolower( bbp_get_user_display_role( bbp_get_reply_author_id( $reply_id ) ) );
	
	$authorid = bbp_get_topic_author_id($args['post_id']);

	$role = 'testrole' . $authorid;


	return '<span class="testrole">' . $author_link . '</span>';
}

//add_filter('bbp_get_reply_author_link', 'bbp_get_reply_author_link_hook', 10, 2 );
function bbp_get_reply_author_link_hook($author_link, $args) {

	//$role = strtolower( bbp_get_user_display_role( bbp_get_reply_author_id( $reply_id ) ) );
	
	$authorid = bbp_get_topic_author_id($args['post_id']);

	$role = 'testrole' . $authorid;


	return '<span class="testrole">' . $author_link . '</span>';
}