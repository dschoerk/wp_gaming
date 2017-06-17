<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link href='https://fonts.googleapis.com/css?family=Audiowide|Iceland|Monoton|Pacifico|Press+Start+2P|Vampiro+One' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" type="text/css" media="screen" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

	<div class="container" id="page" style="background-color: rgba(0,0,0,1); padding: 0;">

		<!-- ******************* The Navbar Area ******************* -->

		<div class="container">
			
		</div>

		<div class="container bevelled d-flex flex-row align-items-center">
			<div class="heading1 logo mr-auto col" style="color: white" style="flex-grow: 1;">
				D43
			</div>

			<!-- User -->

			<?php global $current_user;
				wp_get_current_user();

				/*echo 'Username: ' . $current_user->user_login . "\n";
				echo 'User email: ' . $current_user->user_email . "\n";
				echo 'User level: ' . $current_user->user_level . "\n";
				echo 'User first name: ' . $current_user->user_firstname . "\n";
				echo 'User last name: ' . $current_user->user_lastname . "\n";
				echo 'User display name: ' . $current_user->display_name . "\n";
				echo 'User ID: ' . $current_user->ID . "\n";*/
			?>

			<?php if($current_user->ID != 0) { ?>
				<div class="col-md-2">
					<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search" style="width: 45px; height: 45px" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
						<i class="fa fa-pencil-square-o"></i>
					</button>

					<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search" style="width: 45px; height: 45px">
						<i class="fa fa-cog"></i>
					</button>

					<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search" style="width: 45px; height: 45px">
						<i class="fa fa-envelope"></i>
					</button>
				</div>
				
				
				<div class="col-md-2">
					<div>
						<div class="bevelled d-flex flex-row post">
							<img src="<?php get_avatar_url($current_user->ID) ?>" style="margin-left: 25px; width: 64px; height: 64px">
							<div class="d-flex flex-column" style="flex-grow: 1; justify-content: center;">
								<div>
									<span class="author"><?php echo($current_user->display_name) ?></span>
									<span class="rank"><?php echo($current_user->user_level) ?></span>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			<?php } else { ?>
				<div class="d-flex flex-column" style="margin-right: 30px">
					<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search">
						<i class="fa fa-pencil-square-o"></i> Register
					</button>
				
					<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search">
						<i class="fa fa-lock"></i> Sign In
					</button>
				</div>
			<?php } ?>
		
		</div>

		<div class="container bevelled wrapper-navbar" id="wrapper-navbar">
		
		<!-- <a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content','understrap' ); ?></a> -->

		<nav class="navbar navbar-toggleable-md  navbar-inverse bg-inverse">
			<div class="container" style="padding: 0">

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

					<!-- Your site title as branding in the menu -->
					<!-- <?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"> <?php bloginfo( 'name' ); ?></a></h1>
							
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">  <?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else {
						the_custom_logo();
					} ?> -->
					
					<!-- end custom logo -->

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav svm-menu-item',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>

				<!-- search -->
				<form style="width: 100%; max-width: 320px" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
					<div class="input-group">
						<input class="field form-control" id="s" name="s" type="text"
							placeholder="<?php esc_attr_e( 'Search &hellip;', 'understrap' ); ?>">
						<span class="input-group-btn">
							<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"
							value="<?php esc_attr_e( 'Search', 'understrap' ); ?>">
						</span>
					</div>
				</form>

			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- .wrapper-navbar end -->

	<!--  -->

	<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
	</script>

</body>