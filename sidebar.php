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

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside class="widget span4">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #secondary .widget-area -->		
	<?php endif; ?>
	
	<div class="ad">
		<?php get_adtag_300_1(); ?>
	</div>
		
	<div class="ad">
		<?php get_adtag_300_2(); ?>
	</div>
	
	<div class="ad">
		<?php get_adtag_300_3(); ?>
	</div>
	
	<div class="ad">
		<?php get_adtag_300_4(); ?>
	</div>
	
</div>