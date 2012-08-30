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
<title><?php wp_title( '| Oregon Daily Emerald', true, 'right' ); ?></title>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.css" type="text/css" media="all" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php get_adtag_header(); //load google double click javascipt into head. TODO: move to wp_head hook ?>
<?php get_facebook_and_twitter_setup(); ?>
<?php get_mixpanel_setup(); ?>
<!--about to call wp_head -->
<?php wp_head(); ?>
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

			<div class="span14">
				<div class="navbar">
					<div class="navbar-inner">
						<ul class="nav">
							<?php wp_nav_menu( array( 'theme_location' => 'primary','items_wrap' => '%3$s','container' => false) ); // strip the ul, we're going to build it ourselve ?>
							<li><?php //get_search_form(); ?></li>
						</ul>
					</div> <!-- .navbar-inner -->
				</div> <!-- .navbar -->
			</div>
			
		</header><!-- #masthead -->

		<div class="row">
		<!-- tags still open: body, div.container, div.row - should be closed in footer.php -->
		<!-- END OF HEADER.PHP -->