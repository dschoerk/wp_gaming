<?php
/**
 * Template Name: Frontpage Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper bevelled" id="page-wrapper">

	

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-9<?php else : ?>col-md-12<?php endif; ?> content-area"id="primary">

				<div class="row">

					<div class="col-md-6">
						
						<div class="bevelled">
							<div class="gradient-text" style="font-size: 35px; font-family: Montserrat, sans-serif; text-align: center; margin-top: 10px;  margin-bottom: 10px; ">Welcome to D43 Gaming!</div>	
						</div>

						<div class="bevelled" style="margin-top: 10px; padding: 20px; text-align: center">

							<a href="http://www.gametracker.com/server_info/d43.ovh:28960/" target="_blank">
								<img src="http://cache.gametracker.com/server_info/d43.ovh:28960/b_560_95_1.png" border="0" width="560" height="95" alt=""/>
							</a>
							
							<div style="height: 10px"></div>

							<a href="http://www.gametracker.com/server_info/d43.ovh:28860/" target="_blank">
								<img src="http://cache.gametracker.com/server_info/d43.ovh:28860/b_560_95_1.png" border="0" width="560" height="95" alt=""/>
							</a>

							<div style="height: 10px"></div>

							<a href="http://www.gametracker.com/server_info/d43.ovh:28972/" target="_blank">
								<img src="http://cache.gametracker.com/server_info/d43.ovh:28972/b_560_95_1.png" border="0" width="560" height="95" alt=""/>
							</a>	

							<div style="height: 10px"></div>

							<a href="http://www.gametracker.com/server_info/d43.ovh:28965/" target="_blank">
								<img src="http://cache.gametracker.com/server_info/d43.ovh:28965/b_560_95_1.png" border="0" width="560" height="95" alt=""/>
							</a>
						</div>

					</div>

					<?php $the_query = new WP_Query( 'posts_per_page=-1' ); ?>	
					<div class="col-md-6 post-list-compact">
						
						<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

							<li class="bevelled d-flex flex-row post">
								<a href="<?php echo get_permalink(); ?>">
									<div class="post-img" style="background-image: url(<?php if(has_post_thumbnail()){ echo(the_post_thumbnail_url()); } else { echo(bloginfo('template_directory') . '/img/logo.png'); } ?>)"></div>
								</a>
								<div class="d-flex flex-column post-meta">
									<div class="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
									<div class="text"><?php the_excerpt(); ?></div>
									<div style="margin-top: -10px">
										<!-- <span class="date"><span class="fa fa-calendar"></span> <?php the_date(); ?></span> -
										<span class="author">by <?php the_author(); ?></span> -->
										<span class="views"><i class="fa fa-commenting-o"></i> <?php echo(get_comments_number(get_the_id())); ?></span>
										<span class="comments"><i class="fa fa-eye"></i> <?php echo(get_post_meta(get_the_id(), 'views_count', true)); ?></span>
									</div>
								</div>
							</li>

						<?php 
							endwhile;
							wp_reset_postdata();
						?>
					</ol>
				</div>
			</div>

				<!-- <div class="container-fluid" style="bg-test">
					<div class="bevelled stripe-test" style="padding: 6px; padding-left: 12px; padding-top: 9px; text-transform: uppercase;font-family: Roboto; font-weight: 800; font-size: 14px;">
						<i class="fa fa-newspaper-o" style="color: rgb(37, 194, 245); "></i> News
					</div>
					<div class="content-test row">

						<?php $the_query = new WP_Query( 'posts_per_page=-1' ); ?>

						<div class="col-md-6">
						
							<?php if ($the_query -> have_posts()) : $the_query -> the_post(); ?>
								
								<a href="<?php echo get_permalink(); ?>">
									<div class="post-img post-img-big" style="background-image: url(<?php if(has_post_thumbnail()){ echo(the_post_thumbnail_url()); } else { echo(bloginfo('template_directory') . '/img/logo_tiny.png'); } ?>)">
										<img src="<?php if(has_post_thumbnail()){ echo(the_post_thumbnail_url()); } else { echo(bloginfo('template_directory') . '/img/logo_tiny.png'); } ?>" style="visibility: hidden;" />
									</div>
								</a>
								<a href="<?php echo get_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
								</a>
								<div class="text"><?php the_excerpt(); ?></div>
							<?php endif; ?>
						</div>
						<div class="col-md-6 post-list-compact">
							<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>

								<div class="bevelled d-flex flex-row post">
									<a href="<?php echo get_permalink(); ?>">
										<div class="post-img" style="background-image: url(<?php if(has_post_thumbnail()){ echo(the_post_thumbnail_url()); } else { echo(bloginfo('template_directory') . '/img/logo_tiny.png'); } ?>)"></div>
									</a>
									<div class="d-flex flex-column post-meta">
										<div class="title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></div>
										<div>
											<span class="date"><span class="fa fa-calendar"></span> <?php the_date(); ?></span> -
											<span class="author">by <?php the_author(); ?></span>
										</div>
									</div>
								</div>

							<?php 
								endwhile;
								wp_reset_postdata();
							?>
						</div>
					</div>
				</div> -->

				<!-- <main class="site-main" id="main" role="main">
					<div class="container svm-postlist">
						
						<?php $the_query = new WP_Query( 'posts_per_page=-1' ); ?>
						<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
							<div class="row">
								<div class="d-flex flex-row footer-latest-posting svm-post">
									<?php
										if(has_post_thumbnail())
										{
											?>
												<div class="image" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
											<?php
										}
										else
										{
											?>
												<div class="image" style="background-image: url('<?php bloginfo('template_url'); ?>/img/svm_logo.png');"></div>
											<?php
										}
									?>
									
									<div class="info d-flex flex-column hidden-xs-down">
										<div class="title"><?php the_title(); ?></div>
										<div class="text"><?php the_author(); ?></div>
										<div class="text"><?php get_the_excerpt(); ?></div>
										<a href="<?php echo get_permalink(); ?>"> Weiterlesen...</a>
									</div>
								</div>
							</div>
						<?php 
							endwhile;
							wp_reset_postdata();
						?>

					</div> 

				</main> --><!-- #main -->

			</div><!-- #primary -->

			<?php get_sidebar( 'right' ); ?>

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
