<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper svm-footer" id="wrapper-footer">
	<div class="container">
		<!--
		<div class="row svm-footer-content">
			<div class="col-md-3 svm-footer-col">	
				<h3>Über uns</h3>
				<p>
					Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr				</p>
			</div>

			<div class="col-md-3">	
				<h3>Kategorien</h3>
				
				<a href="#"><p>Kategorien aus Menüleiste wiederholt</p></a>
			</div>

			<div class="col-md-3">	
				<h3>Aktuelle Posts</h3>

				<?php $the_query = new WP_Query( 'posts_per_page=5' ); ?>
				<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
					<div class="d-flex flex-row footer-latest-posting">
						<?php
							if(has_post_thumbnail())
							{
								?>
									<img class="image" src="<?php the_post_thumbnail_url(); ?>">
								<?php
							}
							else
							{
								?>
									<div style="width: 64px; height: 64px"></div>
								<?php
							}
						?>
						
						<div class="info d-flex flex-column hidden-xs-down">
							<div class="title"><?php the_title(); ?></div>
							<div class="text"><?php the_author(); ?></div>
						</div>
					</div>
				<?php 
					endwhile;
					wp_reset_postdata();
				?>

			</div>

			<div class="col-md-3">	
				<h3>Newsletter</h3>
				<form>
					<div class="form-group">
						<label for="email">Email address:</label>
						<input type="email" class="form-control" id="email">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd">
					</div>
					<button style="margin-top: 15px; width: 90%" type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>
-->
		<div class="copyright" style="text-align: center" >
			© 2016 - 2017 D43 Gaming Clan. All rights reserved. Powered by <a href="https://wordpress.org/">Wordpress</a>. Created by <a href="http://schoerkhuber.net">schoerkhuber.net</a>.
		</div>
	</div>

	

<?php if(false) { ?>

	<div class="<?php echo esc_html( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">
						<a href="<?php echo esc_url( __( 'http://wordpress.org/','understrap' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'understrap' ),'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( // WPCS: XSS ok.
							esc_html__( 'Theme: %1$s by %2$s.', 'understrap' ), $the_theme->get( 'Name' ),
						'<a href="http://understrap.com/">understrap.com</a>' ); ?>
						(<?php printf( // WPCS: XSS ok.
							esc_html__( 'Version: %1$s', 'understrap' ), $the_theme->get( 'Version' ) ); ?>)
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

<?php } ?>

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
