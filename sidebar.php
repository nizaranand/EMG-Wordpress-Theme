<?php
/**
 * The Sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<div class="sidebar span4">

	<?php get_search_form(); ?>
	
	<fb:activity site="http://www.dailyemerald.com" app_id="197312536953017"></fb:activity>

	<blockquote>
	  <p>Need a widget here.</p>
	</blockquote>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside class="widget span4">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary .widget-area -->		
	<?php endif; ?>
	
	<div class="ad">
		<?php get_adtag_300_1(); ?>
	</div>
	
	<blockquote>
	  <p>Need a widget here.</p>
	</blockquote>
		
	<div class="ad">
		<?php get_adtag_300_2(); ?>
	</div>
	
	<div class="well">
		Need a widget here.
	</div>
	
	<div class="ad">
		<?php get_adtag_300_3(); ?>
	</div>
	
	<div class="well">
		Need a widget here.
	</div>
	
	<div class="ad">
		<?php get_adtag_300_4(); ?>
	</div>
	
</div>