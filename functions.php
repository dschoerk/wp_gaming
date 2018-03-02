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

// disable plain text editor
function my_editor_settings($settings) {
	$settings['quicktags'] = false;
	return $settings;
}
add_filter('wp_editor_settings', 'my_editor_settings');

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


// user role colors

/*$bbp_rel_nofollow = apply_filters( 'bbp_get_topic_author_link', $bbp_rel_nofollow ); 
if ( !empty( $bbp_rel_nofollow ) ) { 
   // everything has led up to this point... 
}*/

// define the bbp_get_topic_author_link callback 
/*function filter_bbp_get_topic_author_link( $bbp_rel_nofollow ) { 
    // make filter magic happen here... 
	print(htmlspecialchars($bbp_rel_nofollow));
    return $bbp_rel_nofollow; 
};

// add the filter 
add_filter( 'bbp_get_topic_author_link', 'filter_bbp_get_topic_author_link', 10, 1 ); 
*/



// recent replies 


/*
 * Get the most recently replied-to topics, and their most recent reply
 */
function custom_bbpress_recent_replies_by_topic($atts){
  $short_array = shortcode_atts(array('show' => 5, 'forum' => false, 'include_empty_topics' => false), $atts);
  extract($short_array);
  
  // default values
  $post_types = array('reply');
  $meta_key = '_bbp_last_reply_id';
  
  // allow for topics with no replies
  if ($include_empty_topics) {
    $meta_key = '_bbp_last_active_id';
    $post_types[] = 'topic';
  }
  
  // get the 5 topics with the most recent replie
  $args = array(
    'posts_per_page' => $show,
    'post_type' => array('topic'),
    'post_status' => array('publish'),
    'orderby' => 'meta_value_num',
    'order' => 'DESC',
    'meta_key' => $meta_key,
  );

  // allow for specific forum limit
  if ($forum){
    $args['post_parent'] = $forum;
  }
  
  $query = new WP_Query($args);
  $reply_ids = array();  
  
  // get the reply post->IDs for these most-recently-replied-to-topics
  while($query->have_posts()){
    $query->the_post();
    if ($reply_post_id = get_post_meta(get_the_ID(), $meta_key, true)){
      $reply_ids[] = $reply_post_id;
    }
  }
  wp_reset_query();
  
  // get the actual replies themselves
  $args = array(
    'posts_per_page' => $show,
    'post_type' => $post_types,
    'post__in' => $reply_ids,
    'orderby' => 'date',
    'order' => 'DESC'
  );
  
  $query = new WP_Query($args);
  ob_start();
    // loop through results and output our rows
    while($query->have_posts()){
      $query->the_post();
      
      // custom function for a single reply row
      custom_bbpress_recent_reply_row_template( $query->current_post + 1 );
    }
    wp_reset_query();
  
  $output = ob_get_clean();
  return $output;
}
add_shortcode('bbpress_recent_replies_by_topic', 'custom_bbpress_recent_replies_by_topic');

/*
 * Executed during our custom loop
 *  - this should be the only thing you need to edit
 */
function custom_bbpress_recent_reply_row_template( $row_number ){
  // get the reply title
  $title = get_the_title();
  
  // optional title adjustments -- delete or comment out to remove
  // remove "Reply To: " from beginning of title
  $title = str_replace('Reply To: ', '', $title);
  
  // trim title to specific number of characters (55 characters)
  $title = substr( $title, 0, 55);
  
  // trim title to specific number of words (5 words)...
  $title = wp_trim_words( $title, 5, '...');
  
  // determine if odd of even row
  $row_class = ($row_number % 2) ? 'odd' : 'even';  
  ?>
    <div class="bbpress-recent-reply-row <?php print $row_class; ?>">
      <div><?php print $title; ?></div>
      <div>Excerpt: <?php the_excerpt(); ?></div>
      <div>Author: <?php the_author(); ?></div>
      <div>Link To Reply: <a href="<?php the_permalink(); ?>">view reply</a></div>
      <div>Link To Topic#Reply: <a href="<?php print get_permalink( get_post_meta( get_the_ID(), '_bbp_topic_id', true) ); ?>#post-<?php the_ID(); ?>">view reply</a></div>
      <div>Link To Topic/page/#/#Reply: <a href="<?php bbp_reply_url( get_the_ID() ); ?>">view reply paged</a></div>
      <div>Date: <?php the_date(); ?></div>
      <div>Avatar: <?php print get_avatar( get_the_author_meta( 'ID' ) ); ?></div>
      <div>Time Ago: <?php print human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></div>
      <div>bbPress Profile Link: <?php print bbp_user_profile_link( get_the_author_meta( 'ID' ) ); ?></div>
      <div>Avatar linked to bbPress Profile:<a href="<?php print esc_url( bbp_get_user_profile_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php print get_avatar( get_the_author_meta( 'ID' ) ); ?></a></div>
    </div>
  <?php
  
  // Refs
  // http://codex.wordpress.org/Template_Tags#Post_tags
  // http://codex.wordpress.org/Function_Reference/get_avatar
  // http://codex.wordpress.org/Function_Reference/human_time_diff
  // (template tags for bbpress)
  // https://bbpress.trac.wordpress.org/browser/trunk/src/includes/users/template.php  
  // https://bbpress.trac.wordpress.org/browser/trunk/src/includes/replies/template.php
}

// allow shortcodes to run in widgets
add_filter( 'widget_text', 'do_shortcode');
// don't auto-wrap shortcode that appears on a line of it's own
add_filter( 'widget_text', 'shortcode_unautop');

