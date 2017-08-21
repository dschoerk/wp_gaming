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

	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

	<link href='https://fonts.googleapis.com/css?family=Audiowide|Iceland|Monoton|Pacifico|Press+Start+2P|Vampiro+One' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" type="text/css" media="screen" />

	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?> >


	<nav class="navbar navbar-toggleable-md navbar-inverse navbar-custom navbar-absolute">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      
		<!-- <?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'walker'          => new WP_Bootstrap_Navwalker(),
			)
		); ?>

		<div class="nav-item clanlogo hidden-md-down">
			<a class="nav-link" href="/"><img src="<?php echo(bloginfo('template_directory') . '/img/logo.png') ?>"></a>
		</div> -->

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'walker'          => new WP_Bootstrap_Navwalker(),
			)
		); ?>

	  <!-- <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <div class="nav-hover">
              <a class="nav-link dropdown-toggle" href="/" id="nav-home" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="nav-text">Home</span>
              <span class="nav-image icon-home hidden-md-down"></span>
              </a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <div class="nav-hover">
              <a class="nav-link dropdown-toggle" href="/" id="nav-server" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="nav-text">Server</span>
              <span class="nav-image icon-server hidden-md-down"></span>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <div class="nav-hover">
              <a class="nav-link dropdown-toggle" href="#" id="nav-chat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="nav-text">Chatlog</span>
              <span class="nav-image icon-chat hidden-md-down"></span>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <div class="nav-hover">
              <a class="nav-link dropdown-toggle" href="#" id="nav-bans" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="nav-text">Banlist</span>
              <span class="nav-image icon-ban hidden-md-down"></span>
              </a>
            </div>
          </li>

          <li class="nav-item clanlogo hidden-md-down">
            <a class="nav-link" href="/"><img src="<?php echo(bloginfo('template_directory') . '/img/logo.png') ?>"></a>
          </li>
          
					<li class="nav-item dropdown">
            <div class="nav-hover">
              <a class="nav-link dropdown-toggle" href="/search" id="nav-search">
              <span class="nav-text">Search</span>
              <span class="nav-image icon-player hidden-md-down"></span>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-hover">
              <a class="nav-link dropdown-toggle" href="/admins" id="nav-admins">
              <span class="nav-text">Adminlist</span>
              <span class="nav-image icon-admin hidden-md-down"></span>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-hover">
              <a class="nav-link" href="https://d43.ovh" target="_blank" id="nav-clanpage">
              <span class="nav-text">Clanpage</span>
              <span class="nav-image icon-clanpage hidden-md-down"></span>
              </a>
            </div>
          </li>
          <li class="nav-item">
            <div class="nav-hover">
              <a class="nav-link" href="https://d43.ovh" target="_blank" id="nav-forum">
              <span class="nav-text">Forum</span>
              <span class="nav-image icon-board hidden-md-down"></span>
              </a>
            </div>
          </li>
        </ul>
      </div> -->
    </nav>
    
	
	<div class="header-background">
      <div class="img">
      </div>
      	
		<div class="userbuttons container">
			<div class="row" style="float: right;">
				<!-- <div class="btn-div">
					<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search">
						<i class="fa fa-pencil-square-o"></i> Login
					</button>
					
					<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search">
						<i class="fa fa-pencil-square-o"></i> Register
					</button> -->

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
						<!-- <div class="col-md-2">
							<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search" style="width: 45px; height: 45px" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
								<i class="fa fa-pencil-square-o"></i>
							</button>

							<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search" style="width: 45px; height: 45px">
								<i class="fa fa-cog"></i>
							</button>

							<button class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search" style="width: 45px; height: 45px">
								<i class="fa fa-envelope"></i>
							</button>
						</div> -->
						
						
						<div>
							<!-- <div class=" d-flex flex-row post">
								
								<div class="d-flex flex-column" style="flex-grow: 1; justify-content: center;">
									<div>
										<span class="author"><?php echo($current_user->display_name) ?></span>
										<span class="rank"><?php echo($current_user->user_level) ?></span>
									</div>
								</div>
							</div> -->

							<div class="bevelled dropdown" style="display: inline-block; padding-left: 10px; padding-right: 10px; line-height: 50px; height: 50px">
								<a href="<?php echo(bp_loggedin_user_domain() . bp_get_messages_slug()); ?>">
									<i class="fa fa-envelope fa-border badge">
										<?php $unreadMsg = messages_get_unread_count( bp_loggedin_user_id()); if($unreadMsg > 0):?>
											<span class="count"><?php echo($unreadMsg);?></span>
										<?php endif ?>
									</i>
								</a>

								<a href="<?php echo(bp_loggedin_user_domain() . bp_get_notifications_slug()); ?>">
									<i class="fa fa-bell fa-border badge">
										<?php $unreadNotifications = bp_notifications_get_unread_notification_count( bp_loggedin_user_id()); if($unreadNotifications > 0):?>
											<span class="count"><?php echo($unreadNotifications);?></span>
										<?php endif ?>
									</i>
								</a>
							</div>

							<div class="dropdown" style="display: inline-block; vertical-align: top">
								<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
									<img src="<?php $img = get_avatar_url($current_user->ID); if($img) { echo($img); } else { echo(""); } ?>" style="margin-left: 25px; width: 32px; height: 32px">
									<?php echo($current_user->display_name) ?>
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="<?php echo(bp_loggedin_user_domain()); ?>">Profile</a></li>
									<li><a href="<?php echo(bp_loggedin_user_domain() . bp_get_messages_slug()); ?>">Messages</a></li>
									<li><a href="<?php echo(bp_loggedin_user_domain() . '/notifications/'); ?>">Notifications</a></li>
									<li><a href="<?php echo(bp_loggedin_user_domain() . '/profile/change-avatar/'); ?>">Change Avatar</a></li>
									<li><a href="<?php echo wp_logout_url(); ?>">Log Out</a></li>
								</ul>
							</div>

							
						</div>



					<?php } else { ?>
						<div class="">
							<a href="<?php echo wp_registration_url(); ?>" class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="Search">
								<i class="fa fa-pencil-square-o"></i> Register
							</a>
						
							<a class="submit btn btn-primary login-btn" id="searchsubmit" name="submit" type="submit" value="Search" data-toggle="modal" href="#myModal">
								<i class="fa fa-lock"></i> Sign In
							</a>

							<div class="modal hide login-form" id="myModal">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">x</button>
									<h3>Login to www.d43.ovh</h3>
								</div>
								<div class="modal-body">
									<?php wp_login_form( ); ?>
								</div>
								<div class="modal-footer">
									New To d43.ovh?
									<a href="#" class="btn btn-primary" style="margin-left: 20px;">Register</a>
								</div>
							</div>

							<div class="signin-form">
									<?php wp_login_form( ); ?>
							</div>

						</div>
					<?php } ?>
				</div>
			</div> 
		</div>

        


      <div class="spacer">
      </div>
    </div>


</body>