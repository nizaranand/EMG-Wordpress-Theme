<?php
/**
 * The Header for our theme.
 *
 */
?><!DOCTYPE html>
<!--[if IE 7 | IE 8]>
<html class="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'DailyEmerald' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | University of Oregon news, sports and entertainment.";

	?></title>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/emerald.css" type="text/css" media="all" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php

emg_head_fb_open_graph();

wp_enqueue_script("jquery", "http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js", true);
wp_enqueue_script("bootstrap", get_template_directory_uri() . '/js/bootstrap.js', true);
wp_enqueue_script("jquery-timeago", "http://cdnjs.cloudflare.com/ajax/libs/jquery-timeago/0.9.3/jquery.timeago.js", true);
wp_enqueue_script("dailyemerald", get_template_directory_uri() . '/js/dailyemerald.js', true);
wp_enqueue_script("socketio", "http://dev.dailyemerald.com:5335/socket.io/socket.io.js", true);
wp_enqueue_script("readerboard-client", "http://dev.dailyemerald.com:5335/readerboard-client.js", true);

?>


<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php get_adtag_header(); //load google double click javascipt into head. TODO: move to wp_head hook ?>
<?php get_facebook_and_twitter_setup(); ?>
<?php get_mixpanel_setup(); ?>
<!--about to call wp_head -->
<?php wp_head(); 

date_default_timezone_set('America/Los_Angeles'); // TODO: This is a hack to fix the iso1860 output. need to fix.

?>
</head>

<body>
	<div class="container">
			
		<header class="row">
	

	
			<div class="span14" style="height:20px"></div>
	
			<div id="flag" class="span3">
				<a href="/">
					<img src="<?php bloginfo('template_directory'); ?>/images/daily-emerald-logo.png" />
				</a>
			</div>
			
			<div class="hidden-phone pull-right"><!-- hide this on small screens -->
				<?php get_adtag_leaderboard(); // inc/get_adtag.php ?>
			</div>
			
			<div class="span14" style="height:20px"></div>			
						
			<div id="menu-wrapper" class="span14">
					<?php wp_nav_menu( 
					    	array( 
					    		'menu' => 'main_nav', /* menu name */
					    		'menu_class' => 'nav nav-tabs',
					    		'theme_location' => 'primary', /* where in the theme it's assigned */
					    		'container' => 'false', /* container class */
					    		'fallback_cb' => 'bones_main_nav_fallback', /* menu fallback */
					    		'depth' => '2', /* suppress lower levels for now */
					    		'walker' => new description_walker()
					    	)
					    );
					?>
			</div>
								
		</header><!-- #masthead -->

		<div class="row">
		<!-- tags still open: body, div.container, div.row - should be closed in footer.php -->
		<!-- END OF HEADER.PHP -->
