<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<!-- <ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>
	<li class="bbp-topic-title">

		<?php if ( bbp_is_user_home() ) : ?>

			<?php if ( bbp_is_favorites() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

					<?php bbp_topic_favorite_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

				</span>

			<?php elseif ( bbp_is_subscriptions() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

					<?php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

				</span>

			<?php endif; ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>

		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php bbp_topic_pagination(); ?>

		<?php do_action( 'bbp_theme_before_topic_meta' ); ?>

		<p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>

			<span class="bbp-topic-started-by"><?php printf( __( 'Started by: %1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?></span>

			<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

			<?php if ( !bbp_is_single_forum() || ( bbp_get_topic_forum_id() !== bbp_get_forum_id() ) ) : ?>

				<?php do_action( 'bbp_theme_before_topic_started_in' ); ?>

				<span class="bbp-topic-started-in"><?php printf( __( 'in: <a href="%1$s">%2$s</a>', 'bbpress' ), bbp_get_forum_permalink( bbp_get_topic_forum_id() ), bbp_get_forum_title( bbp_get_topic_forum_id() ) ); ?></span>

				<?php do_action( 'bbp_theme_after_topic_started_in' ); ?>

			<?php endif; ?>

		</p>

		<?php do_action( 'bbp_theme_after_topic_meta' ); ?>

		<?php bbp_topic_row_actions(); ?>

	</li>

	<li class="bbp-topic-voice-count"><?php bbp_topic_voice_count(); ?></li>

	<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></li>

	<li class="bbp-topic-freshness">

		<?php do_action( 'bbp_theme_before_topic_freshness_link' ); ?>

		<?php bbp_topic_freshness_link(); ?>

		<?php do_action( 'bbp_theme_after_topic_freshness_link' ); ?>

		<p class="bbp-topic-meta">

			<?php do_action( 'bbp_theme_before_topic_freshness_author' ); ?>

			<span class="bbp-topic-freshness-author"><?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 14 ) ); ?></span>

			<?php do_action( 'bbp_theme_after_topic_freshness_author' ); ?>

		</p>
	</li>

</ul>--> <!-- #bbp-topic-<?php bbp_topic_id(); ?> -->

<div <?php bbp_topic_class(); ?>>
	<div class="row bbp-single-forum">
	
	<div class="col-md-5">

		<?php if ( bbp_is_user_home() ) : ?>

			<?php if ( bbp_is_favorites() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_favorites_action' ); ?>

					<?php bbp_topic_favorite_link( array( 'before' => '', 'favorite' => '+', 'favorited' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_favorites_action' ); ?>

				</span>

			<?php elseif ( bbp_is_subscriptions() ) : ?>

				<span class="bbp-row-actions">

					<?php do_action( 'bbp_theme_before_topic_subscription_action' ); ?>

					<?php bbp_topic_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); ?>

					<?php do_action( 'bbp_theme_after_topic_subscription_action' ); ?>

				</span>

			<?php endif; ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_topic_title' ); ?>


		<div class="title">
			<i class='fa fa-lock closed-span' aria-hidden='true'></i> 
			<span class="sticky-span"></span>
			<span class="trash-span"></span>
			<a href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a>
		</div>

		<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>
		<div>
			<?php printf( __( 'Started by: %1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '14' ) ) ); ?>
		</div>
		<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>

		<?php do_action( 'bbp_theme_after_topic_title' ); ?>

		<?php bbp_topic_pagination(); ?>

		<?php do_action( 'bbp_theme_before_topic_meta' ); ?>
		<?php do_action( 'bbp_theme_after_topic_meta' ); ?>

	</div>

	<div class="col-md-1" style="text-align: center">
		<div class="postcount">
			<?php bbp_topic_voice_count(); ?>
		</div>
		<div>
			Voices
		</div>
	</div>

	<div class="col-md-1" style="text-align: center">
		<div class="postcount">
			<?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?>
		</div>
		<div>
			Replies
		</div>
	</div>

	<div class="col-md-4">
		<!-- <div class="d-flex flex-row">
			<div class="thumbnail" style="background-image: url('http://www.hbhud.com/wp-content/uploads/2011/06/awesome_smiley-300x300.png'); margin-left: 25px"></div>
			<div class="d-flex flex-column" style="flex-grow: 1; justify-content: center;">
				<div>
					<span class="author"><?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 14 ) ); ?></span> 
					<span>
						<?php echo bbp_get_topic_last_active_time( bbp_get_topic_last_active_id() ); ?>

					</span>
				</div>
				
			</div>
		</div> -->

		
		<?php
			$topic_id = bbp_get_topic_last_active_id();
			$author_img = bbp_get_topic_author_link( array( 'post_id' => $topic_id, 'type' => 'avatar', 'size' => 40 ) );
			$author_link = bbp_get_topic_author_link( array( 'post_id' => $topic_id, 'type' => 'name' ) );
			// $time = bbp_topic_last_active_time( $topic_id );
			//$title = bbp_topic_title( $topic_id );
		?>
			<li class="d-flex flex-row align-items-stretch topic-desc">
				<?php echo($author_img); ?>
				<div class="meta">
					<div class="title"><a href="<?php echo($permalink); ?>"><?php bbp_topic_title( $topic_id ); ?></a></div>
					<span class="author">by <?php echo( $author_link ); ?></span>
					<span class="time"><?php bbp_topic_last_active_time( $topic_id ); ?></span>
				</div>
			</li>
	

		<!-- <div style="width: 32px;">
			<?php bbp_author_link( array( 'post_id' => $lastActiveTopic ) ); ?>
		</div>
		<span>
			<?php echo($lastActiveTopicTitle); ?>
		</span> -->
	</div>
	</div>
</div>