<?php

/**
 * Forums Loop - Single Category
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<!-- category title -->
<div class="bbp-forum-title">
    <a href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>
</div>

<!-- category body -->
<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>

	<li class="bbp-forum-info">

		<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

			<span class="bbp-row-actions">

				<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

				<?php bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

				<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

			</span>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<!-- <a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a> -->

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>
		

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

<?php
		$sub_forums = bbp_forum_get_subforums( bbp_get_forum_id() );
		if ( !empty( $sub_forums ) ) {

			$i = 0;
			// Total count (for separator)
			$total_subs = count( $sub_forums );
			foreach ( $sub_forums as $sub_forum ) {
				$i++; // Separator count

				// Get forum details
				//$count     = array();
				//$show_sep  = $total_subs > $i ? ',' : '';
				$permalink = bbp_get_forum_permalink( $sub_forum->ID );
				$title     = bbp_get_forum_title( $sub_forum->ID );
				$description = bbp_get_forum_content( $sub_forum->ID );
				$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $sub_forum->ID ), 'large' )[0];

				// Show topic count
				/*if ( !bbp_is_forum_category( $sub_forum->ID ) ) {
					$count['topic'] = bbp_get_forum_topic_count( $sub_forum->ID );
				}

				// Show reply count
				if ( !bbp_is_forum_category( $sub_forum->ID ) ) {
					$count['reply'] = bbp_get_forum_reply_count( $sub_forum->ID );
				}*/

				$lastActiveTopic = bbp_get_forum_last_active_id( $sub_forum->ID );
				$lastActiveTopicTitle = bbp_get_forum_title( $lastActiveTopic );
				//$lastActiveTopicLink = ;//bbp_get_forum_permalink( $lastActiveTopic );
				$lastActiveTopicAuthorID = bbp_get_topic_author_id( $lastActiveTopic );
				$lastActiveTopicAuthor = get_user_by( 'ID', $lastActiveTopicAuthorID );
				

				?>
					<div class="bbp-single-forum d-flex flex-row align-items-left">
						
						<div class="post-title">

							<div class="d-flex flex-row">
								<div class="thumbnail" style="background-image: url('<?php echo($thumbnail); ?>');"></div>

								<div>
									<div class="title"><a href="<?php echo($permalink); ?>"><?php echo($title); ?></a></div>
									
									<!-- show subforums -->
									<?php bbp_list_forums(array('forum_id' => $sub_forum->ID)); ?>
									<div class="description"><?php echo($description); ?></div>
								</div>
							</div>

						</div>
						<div class="postcount-col">
							<div class="postcount">
								<?php echo(bbp_get_forum_topic_count( $sub_forum->ID )); ?>
							</div>
							<div>
								Posts
							</div>
						</div>
						<div class="replycount-col">
							<div class="replycount">
								<?php echo(bbp_get_forum_reply_count( $sub_forum->ID )); ?>
							</div>
							<div>
								Replies
							</div>
						</div>
						<div class="latest-topic">
							<div class="latest-topic-content">
								<!-- <div class="thumbnail" style="background-image: url('http://www.hbhud.com/wp-content/uploads/2011/06/awesome_smiley-300x300.png'); margin-left: 25px"></div> -->
								<div style="flex-grow: 0;">
									<?php echo bbp_get_topic_author_link( array( 'post_id' => $lastActiveTopic,"type" => "avatar", "size" => 42 ) ); ?>
								</div>
								<div style="margin-left: 10px; flex-grow: 1; width: 0;">
									<div class="title"><a href="<?php bbp_forum_last_reply_url( $sub_forum->ID ) ?>"><?php echo($lastActiveTopicTitle); ?></a></div>
									<div>
										<span class="author"><?php echo($lastActiveTopicAuthor->display_name); ?></span>, 
										<span>
											<?php bbp_forum_last_active_time( $sub_forum->ID ); ?>
										</span>
										<!-- <span class="date"><span class="fa fa-calendar"></span> 01.01.1970</span> -->
									</div>
									
								</div>
							</div>
							<!-- <div style="width: 32px;">
								<?php bbp_author_link( array( 'post_id' => $lastActiveTopic ) ); ?>
							</div>
							<span>
								<?php echo($lastActiveTopicTitle); ?>
							</span> -->
						</div>
					</div>
					
				<?php

				/*// Counts to show
				if ( !empty( $count ) ) {
					$counts = $r['count_before'] . implode( $r['count_sep'], $count ) . $r['count_after'];
				}*/

				// Build this sub forums link
				// $output .= $r['link_before'] . '<a href="' . esc_url( $permalink ) . '" class="bbp-forum-link">' . $title . $counts . '</a>' . $show_sep . $r['link_after'];
			}

			// Output the list
			// echo apply_filters( 'bbp_list_forums', $r['before'] . $output . $r['after'], $r );
		}
?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php bbp_forum_row_actions(); ?>

	</li>

	<!--<li class="bbp-forum-topic-count"><?php bbp_forum_topic_count(); ?></li>

	<li class="bbp-forum-reply-count"><?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?></li>

	<li class="bbp-forum-freshness">

		<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>

		<?php bbp_forum_freshness_link(); ?>

		<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?>

		<p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_author' ); ?>

			<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 14 ) ); ?></span>

			<?php do_action( 'bbp_theme_after_topic_author' ); ?>

		</p>
	</li> -->

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
